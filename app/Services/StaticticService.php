<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Models\apply_job;
use App\Models\job;
use Illuminate\Support\Facades\DB;

class StaticticService
{

    protected $_jobRepository;


    public function __construct(
        JobRepository $jobRepository
    ) {
        $this->_jobRepository = $jobRepository;
    }


    public function getCountPostByRecruiter($id)
    {
        return count($this->_jobRepository->getJobByIdRecruiter($id));
    }

    public function getCountApply($id)
    {
        $listPost = $this->_jobRepository->getJobByIdRecruiter($id);
        $totalUserAplly = 0;
        if ($listPost) {
            foreach ($listPost as $item) {
                $countUserAplly = count(apply_job::where('id_job', $item->job_id)->get());
                $totalUserAplly = $totalUserAplly + $countUserAplly;
            }
        }
        return $totalUserAplly;
    }

    public function getCountUserApply($id)
    {
        $idJobArray = array();
        $listPost = $this->_jobRepository->getJobByIdRecruiter($id);
        if ($listPost) {
            foreach ($listPost as $item) {
                $idJobArray[] = $item->job_id;
            }
        }
        $countUserAplly = apply_job::whereIn('id_job', $idJobArray)->groupBy('id_job')
            ->selectRaw('count(*) as total, id_job')
            ->orderby('total', 'desc')->take(3)->get();
        return $countUserAplly;
    }

    public function getTotalJobByMonth($id, $year)
    {

        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $countPosts = job::selectRaw('count(*) as total')->where('id_user', $id)
            ->whereYear('job_date', date($year))
            ->groupBy(DB::Raw('Month(job_date)'))
            ->pluck('total');
        $month = job::selectRaw('Month(job_date) as month')->where('id_user', $id)
            ->whereYear('job_date', date($year))
            ->groupBy(DB::Raw('Month(job_date)'))
            ->pluck('month');

        foreach ($month as $i => $value) {
            --$value;
            $data[$value] = $countPosts[$i];
        }

        return $data;
    }

    public function getTotalCadidateByMonth($id, $year)
    {

        $idJobArray = array();
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $listPost = $this->_jobRepository->getJobByIdRecruiter($id);
        if ($listPost) {
            foreach ($listPost as $item) {
                $idJobArray[] = $item->job_id;
            }
        }


        $countCandidate = apply_job::selectRaw('count(*) as total')->whereIn('id_job', $idJobArray)
            ->whereYear('create_at', date($year))
            ->groupBy(DB::Raw('Month(create_at)'))
            ->pluck('total');
        $month = apply_job::selectRaw('Month(create_at) as month')->whereIn('id_job', $idJobArray)
            ->whereYear('create_at', date($year))
            ->groupBy(DB::Raw('Month(create_at)'))
            ->pluck('month');
        foreach ($month as $i => $value) {
            --$value;
            $data[$value] = $countCandidate[$i];
        }

        return $data;
    }
}
