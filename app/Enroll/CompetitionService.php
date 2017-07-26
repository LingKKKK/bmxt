<?php
namespace App\Enroll;

use App\Enroll\Models\Competition;
use App\Enroll\Models\CompetitionEvent;


/*
 * 邀请码管理
 */
class CompetitionService
{
	

	public function initEvents()
	{
		$origin_data = [
			'未来世界' => [
				'WRO常规赛' => [
					'小学' => 1,
					'初中' => 1,
					'高中' => 1,
					'大专' => 1,
				],
				'EV3足球赛' => [
					'小学' => 1,
					'中学(含初高中)' => 1,
				],
				'WRO创意赛-“可持续发展' => [

				],
			]
		];
		$this->initEventsRecursive($origin_data);
	}

	private function initEventsRecursive($data, $parent_id = 0)
	{
		if (!is_array($data)) {
			return;
		}

		foreach ($data as $name => $val) {
			$id = $this->addEvents($name, $parent_id);
			$this->initEventsRecursive($val, $id);
		}
	}

	private function addEvents($name, $parent_id = 0)
	{
		$event = CompetitionEvent::create([
			'name' => $name,
			'parent_id' => $parent_id,
		]);

		return $event->id;
	}

	public function getAllType()
	{
		
	}


}
