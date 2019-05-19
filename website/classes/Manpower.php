<?php

class Manpower
{
	public function getManpowers($table)
	{
		$query = "SELECT * FROM $table";
		$data  = DB::select($query);
		return $data;
	}

	public function getTeacherBySearch($key)
	{
		$query = "SELECT * FROM total_teachers WHERE teacher_name LIKE '%$key%' OR mobile LIKE '%$key%'";
        $data  = DB::select($query);
        return $data;
	}

	public function getStaffBySearch($key)
	{
		$query = "SELECT * FROM total_staff WHERE staff_name LIKE '%$key%' OR mobile LIKE '%$key%'";
        $data  = DB::select($query);
        return $data;
	}





}