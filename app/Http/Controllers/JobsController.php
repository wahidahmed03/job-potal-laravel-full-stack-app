<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\JobsApplicationS;

use Illuminate\Support\Facades\Auth;


class JobsController extends Controller
{
    public function showJobsForm()
    {
        $user = Auth::user();
        if($user['role'] == 'company'){  // CHEACK ACCOUNT ROLL
            unset($user['password']);  
            return view('components.pages.Dashboard.Add_jobs' , compact('user'));
        }else{
            return redirect()->route('Apply.job.User.Dashbord');
        }
    } /// END FUNCTION


    public function AddJobs(Request $request)
    {
        $user = Auth::user();
        unset($user['password']);

        if($user['role'] != 'company') return redirect()->route('Apply.job.User.Dashbord'); // CHEACK ACCOUNT ROLL
        
        $request->validate([
            'Job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_category' => 'required|string',
            'job_location' => 'required|string',
            'job_level' => 'required|string',
            'job_Salary' => 'required|numeric',
        ]);
        $jobs = Jobs::create([
            'title' => $request->input('Job_title'),
            'description' => $request->input('job_description'),
            'category' => $request->input('job_category'),
            'location' => $request->input('job_location'),
            'level' => $request->input('job_level'),
            'salary' => $request->input('job_Salary'),
            'user_id' => auth()->id(), 
        ]);
        return redirect()->route('Company.jobs_ManageForm')->with('success', 'Job added successfully!');
    } /// END FUNCTION


    public function ManageJobsData()
    {
        $user = Auth::user();
        $user_id = auth()->id();
        if($user['role'] != 'company') return redirect()->route('Apply.job.User.Dashbord'); // CHEACK ACCOUNT ROLL
        unset($user['password']);
        $jobs = Jobs::with('jobApplications')
        ->where('user_id',$user_id)
        ->get();
        return view('components.pages.Dashboard.Manage_jobs' , compact('jobs', 'user'));
    }/// END FUNCTION




    public function ViewApplicationData()
    {
        $user = Auth::user();
        unset($user['password']);
        if($user['role'] != 'company') return redirect()->route('Apply.job.User.Dashbord'); // CHEACK ACCOUNT ROLL
        $user_id = auth()->id();
        $applicationData = JobsApplicationS::with('user', 'job', )
            ->where('CompanyId', $user_id)
            ->get();
        return view('components.pages.Dashboard.ViewApplication' , compact('user','applicationData'));
    } /// END FUNCTION

    public function ChangeJobsStatus(Request $request)
    {
        $user = Auth::user();
        unset($user['password']);
        if($user['role'] != 'company') return redirect()->route('Apply.job.User.Dashbord');

        $request->validate([
            'id' => 'required|string|max:255',
            'status' => 'required|string',
        ]);
        
        JobsApplicationS::updateOrCreate(
            ['id' =>$request['id']],
            ['status'=> $request['status']]
        );
        return redirect()->route('Company.jobs.view.applicand')->with('success', 'Job added successfully!');
    }/// END FUNCTION


    public function AllJobsForGustAndUser (){
        $jobs = Jobs::orderBy('id', 'desc')->paginate(12);
        $user = Auth::user();
        unset($user['password']);
        return view('components.pages.Home', compact('jobs','user'));
    }/// END FUNCTION

    public function ApplyJobPage($id){
        if(auth()->id()){
            $user = Auth::user();
            $user_id = auth()->id();
            $IsApplied = null;
            $applicationData = JobsApplicationS::with('user')
                ->where('user_id', $user_id)
                ->get();
            if ($applicationData->count() > 0){
                foreach ($applicationData as $application){
                    $IsApplied = $application['user_id'] == $user_id && $application['job_id'] == $id;
                    if($IsApplied) break; 
                }
            }
            $job = Jobs::with(['user', 'user.jobs'])->find($id);
            return view('components.pages.User.ApplyJob' , compact('job','applicationData','IsApplied','user'));
        }

        else{
            $job = Jobs::with(['user', 'user.jobs'])->find($id);
            return view('components.pages.User.ApplyJob' , compact('job'));
        }

    }/// END FUNCTION

    public function ApplyJob(Request $request, $id){
        $user = Auth::user();
        unset($user['password']);
        if($user['role'] == 'company') return redirect()->route('Company.jobs_ManageForm');

        $user_id =auth()->id();
        $ApplicationData = JobsApplicationS::create([
            'user_id' => $user_id , 
            'job_id' => $id,
            'CompanyId'=>$request['CompanyId'],
        ]);
        return redirect()->route('Apply.jobs_page',['id' => $id])->with('success', 'Job added successfully!');
    }/// END FUNCTION


    public function FilterJobBySearchForNormalUser (Request $request){
        $user = Auth::user();
        unset($user['password']);

        if($request->input('categories') || $request->input('locationes')){
            $categories = $request->input('categories');
            $locationes = $request->input('locationes');
            $checkedFilter = [
                'category' => $categories,
                'location' => $locationes,
            ];

            $jobs = Jobs::where(function ($query) use ($categories, $locationes) {
                if ($categories) {
                    $query->where('category', $categories);
                }
                if ($locationes) {
                    $query->orWhere('location', $locationes);
                }
            })->paginate(10);;
            return view('components.pages.Home', compact('jobs', 'checkedFilter','user'));
        }
        else{
            $title = $request->input('title');
            $location = $request->input('location');
            $filter = [];
            $Getjobs = Jobs::query();
            if($title){
                $Getjobs->where ('title', 'like', '%' . $title . '%');
                $filter['title'] = $title;
            }
            if($location){
                $Getjobs->where('location', 'LIKE', '%' . $location . '%');
                $filter['location'] = $location; 
            }
            $jobs = $Getjobs->paginate(10);
            return view('components.pages.Home', compact('jobs', 'filter'));
        }
    }/// END FUNCTION

    public function ViewUserApplication(Request $request){
        $user = Auth::user();
        unset($user['password']);
        if($user['role'] == 'company') return redirect()->route('Company.jobs_ManageForm');
        $user_id = auth()->id();
        $applicationData = JobsApplicationS::with('user', 'job', 'job.user')
        ->where('user_id', $user_id)
        ->get();
        return view('components.pages.User.ViewUserApplications', compact('user','applicationData'));
    }/// END FUNCTION
}

