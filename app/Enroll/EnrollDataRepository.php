<?php

namespace App\Enroll;


class EnrollDataRepository
{
    public function getActivity($act_id)
    {
        if (empty($act_id)) {
            return null;
        }

        $act = Activity::find($act_id);
        if ($act) {
            $act['form_design'] = json_decode($act['form_design'], true);
        }
        return $act;
    }

    public function getEnrollData($id)
    {
        if (empty($id)) {
            return null;
        }

        $id = intval($id);
        $enroll_data = EnrollData::find($id);
        if (empty($enroll_data)) {
            return null;
        }

        $enroll_data['data'] = json_decode($enroll_data['data'], true);
        $enroll_data->activity['form_design'] = json_decode($enroll_data->activity['form_design'], true);
        return $enroll_data;
    }

    public function saveEnrollData($id)
    {
        # code...
    }
}
