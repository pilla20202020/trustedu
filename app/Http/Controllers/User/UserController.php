<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Modules\Service\Permission\PermissionService;
use App\Modules\Service\Role\RoleService;
use App\Modules\Service\User\UserService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use mysqli;

class UserController extends Controller
{

    protected $user, $role, $permission;

    function __construct(UserService $user, RoleService $role, PermissionService $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function backup() {
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $backup_name        = "mybackup.sql";
        $tables             = array(
            "branches", "users", "password_resets", "failed_jobs", "countries",
            "provinces", "districts", "municipalities", "permission","menuses" ,
            "albums", "galleries", "categories", "blogs", "testimonials", "events", "downloads", "settings", "sliders",
           "study_pages", "forms", "contacts", "bookings", "tabs", "abouts", "partners", "photos", "newsletters"
        ); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','",$table_value_array) . "');\n";

            }
        }
        $file_name = 'motif_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }

    public function index()
    {
        //
        $user = $this->user->paginate();
        return view ('user.index',compact('user'));
    }

    public function getAllData()
    {
        // dd($this->user);
        return $this->user->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles =$this->role->paginate();
        $permissions =$this->permission->paginate();
        return view('user.create',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        if($user = $this->user->create($request->all())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $user);
            }
            $user->assignRole($request->input('roles'));
            // $user->syncPermissions($request->input('permissions'));
            Toastr()->success('User Created Successfully','Success');
            return redirect()->route('user.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->user->getBySlug($id);
        $userRoles =$this->user->getUserRoles($user->id);
        $roles =$this->role->paginate();
        return view('user.edit',compact('user','roles','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = $this->user->find($id);
        $input = $request->except('roles');
        $user->syncRoles($request->input('roles'));
        $user = $this->user->update($id,$input);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($this->user->delete($id)) {
            return redirect()->route('user.index');
        }
    }

    public function profileUpdate() {
        return view('user.profile-update');
    }

    public function profileUpdateStore(Request $request, $id) {
        if($user = $this->user->profileUpdate($request->all(), $id)) {
            // $user->syncPermissions($request->input('permissions'));
            Toastr()->success('User Profile Updated Successfully','Success');
            return redirect()->route('dashboard');

        }
    }

    public function forgetPassword(Request $request) {
        return view('auth.passwords.reset');
    }

    public function updatePassword(Request $request) {
        $user = $this->user->passwordUpdate($request->all());
        if($user == true) {
            Toastr()->success('Password has been Updated Successfully','Success');
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }


    }
}
