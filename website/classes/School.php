<?php 
	
class School
{
	public function calenderHolidayCheck($day, $month)
	{
		$query = "SELECT * FROM calendar WHERE day='$day' AND month='$month'";
		$data = DB::select($query);
		$datum = $data->fetch_assoc();
		if ($data->num_rows > 0) {
			return "<span class='font-weight-bold p-2'><span class='text-warning'> * </span>".$day."</span>";
		}else{
			return $day;
		}
	}

	public function getHolidayByMonth($month)
	{
		$query = "SELECT * FROM calendar WHERE month='$month'";
		$data = DB::select($query);
		return $data;
	}

    public function getLatestNotice()
    {
        $query = "SELECT * FROM notice ORDER BY id DESC LIMIT 4";
        $data = DB::select($query);
        return $data;
	}

	public function getAllNotice()
    {
        $query = "SELECT * FROM notice ORDER BY id DESC";
        $data = DB::select($query);
        return $data;
	}

    public function getSingleNotice($id)
    {
        $notice_id = mysqli_real_escape_string(DB::connection(), $id);
        $query = "SELECT * FROM notice WHERE id='$notice_id'";
        $data = DB::select($query)->fetch_assoc();
        return $data;
	}

	public function complain($data)
	{
		$subject = mysqli_real_escape_string(DB::connection(), $data['subject']);
		$mobile = mysqli_real_escape_string(DB::connection(), $data['mobile']);
		$complain = mysqli_real_escape_string(DB::connection(), $data['complain']);

		if (empty($subject) OR empty($mobile) OR empty($complain)) {
			return "<div class='alert alert-warning text-center font-weight-normal'>Please fill out all fields.</div>";
		} else {
			$query = "INSERT INTO total_complain(subject, mobile, description, status) VALUES('$subject', '$mobile', '$complain', '0')";
			$insert = DB::insert($query);
			if ($insert) {
				return "<div class='alert alert-success text-center font-weight-normal'>Complain send successfully.</div>";
			} else {
				return "<div class='alert alert-danger text-center font-weight-normal'>Something went wrong! Complain send failed.</div>";
			}
			
		}
		
	}

	public function contact($data)
	{
		$mobile = mysqli_real_escape_string(DB::connection(), $data['mobile']);
		$message = mysqli_real_escape_string(DB::connection(), $data['message']);

		if (empty($mobile) OR empty($message)) {
			return "<div class='alert alert-warning text-center font-weight-normal'>Please fill out all fields.</div>";
		} else {
			$query = "INSERT INTO total_complain(mobile, description, status) VALUES('$mobile', '$message', '0')";
			$insert = DB::insert($query);
			if ($insert) {
				return "<div class='alert alert-success text-center font-weight-normal'>Message send successfully.</div>";
			} else {
				return "<div class='alert alert-danger text-center font-weight-normal'>Something went wrong! Message send failed.</div>";
			}
			
		}
	}

	public function getGalleryItem($start_from, $per_page)
	{
		$query = "SELECT * FROM gallery ORDER BY id DESC LIMIT $start_from, $per_page";
		$data = DB::select($query);
        return $data;
	}

	public function totalGalleryItem()
	{
		$query = "SELECT * FROM gallery";
		$data = DB::select($query);
        return $data->num_rows;
	}


}

 ?>