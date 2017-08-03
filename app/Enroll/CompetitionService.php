<?php
namespace App\Enroll;

use App\Enroll\Models\Competition;
use App\Enroll\Models\CompetitionEvent;


/*
 * 邀请码管理
 */
class CompetitionService
{

	protected $competitionList = null;

	public function initEvents()
	{
		$origin_data = [
			'未来世界' => [
			    'WRO常规赛' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			        "大专" => 1,
			    ],
			    'EV3足球赛' => [
			        "小学" => 1,
			        "中学(含初高中)" => 1,
			    ],
			    'WRO创意赛——"可持续发展"' => [
			        "小学" => 1,
			        "中学(含初高中)" => 1,
			    ],
			],
			'博思威龙' => [
			    'VEX-EDR"步步为营"工程挑战赛' => [
			        '中学(含小初)' => 1,
			        '高中' => 1,
			    ],
			    'VEX-IQ"环环相扣"工程挑战赛' => [
			        '小学' => 1,
			        '初中' => 1,
			    ],
			    'BDS机器人工程挑战赛——"长城意志"' => [
			        '小初高' => 1,
			    ],
			],
			'工业时代' => [
			    '能力风暴——WER能力挑战赛' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			    '能力风暴——WER能力挑战赛工程创新赛' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			    '能力风暴——WER普及赛' => [
			        "小学" => 1,
			        "初中" => 1,
			    ],
			],
			'攻城大师' => [
			    '攻城大师' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			],
			'智造大挑战' => [
			    '智造大挑战' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			],
		];

		$origin_data = $this->getOriginData();
		$this->initEventsRecursive($origin_data);
	}

	private function getOriginData()
	{
		$origin_data = [
			'攻城大师' => [
			    '攻城大师' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			],
			'博思威龙' => [
			    'VEX-EDR"步步为营"工程挑战赛' => [
			        '中学(含小初)' => 1,
			        '高中' => 1,
			        '大学' => 1,
			    ],
			    'VEX-IQ"环环相扣"工程挑战赛' => [
			        '小学' => 1,
			        '初中' => 1,
			    ],
			],
			'工业时代' => [
			    '能力风暴——WER能力挑战赛' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			    '能力风暴——WER能力挑战赛工程创新赛' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			    '能力风暴——WER普及赛' => [
			        "小学" => 1,
			        "初中" => 1,
			    ],
			],
			'未来世界' => [
			    '常规赛' => [
			        "小学" => 1,
			        "初中" => 1,
			        "高中" => 1,
			    ],
			],
			'智造大挑战' => [
			    '智造大挑战' => [
			        "中学（含小初）" => 1,
			    ],
			],
			'创客生存挑战赛' => [
				'创客生存挑战赛' => [
					'小学' => 1,
					'高中' => 1
				]
			],
			'智慧日月潭' => [
				'智慧日月潭' => [
					'初中' => 1,
					'小初高' => 1
				]
			]
		];

		return $origin_data;
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

	public function getCompetitionList()
	{

		// 计算出第一层数据
		$result = $this->findChidren(0);


		foreach ($result as $id => $value) {
			$result[$id]['children'] = $this->findChidren($id);
		}

		foreach ($result as $id1 => $val_level1) {
			foreach ($val_level1['children'] as $id2 => $val_level2) {
				$result[$id1]['children'][$id2]['children'] = $this->findChidren($id2);
			}
		}

		return $result;
	}

	public function findChidren($parent_id)
	{
		if ($this->competitionList == null) {
			$this->competitionList = CompetitionEvent::all();
		}

		$children = [];
		foreach ($this->competitionList as $k => $val) {
			if ($val['parent_id'] == $parent_id) {
				$children[$val['id']] = [
					'id' => $val['id'],
					'name' => $val['name']
				];
			}
		}

		return $children;
	}

}
