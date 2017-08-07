<?php
namespace App\Enroll;

use App\Enroll\Models\Competition;
use App\Enroll\Models\CompetitionEvent;
use App\Enroll\Models\CompetitionTeam;
use App\Enroll\Models\CompetitionTeamMember;
use Excel;

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
			        '高中' => 1,
			    ],
			],
			'创客生存挑战赛' => [
				'创客生存挑战赛' => [
					'小学' => 1,
					'初中' => 1,
				]
			],
			'智慧日月潭' => [
				'智慧日月潭' => [
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

    public function searchTeam($team_no, $contact_mobile)
    {
        $teamData = CompetitionTeam::where('team_no', $team_no)
                                    ->where('contact_mobile', $contact_mobile)
                                    ->with('members')->first();

        if ($teamData === null) {
            return null;
        }

        // 比赛项目
        $teamEvent = $teamData->event;
        $eventItems = collect([]);
        while ($teamEvent != null) {
            $eventItems->push([
                'id' => $teamEvent->id,
                'name'   => $teamEvent->name,
                'parent_id' => $teamEvent->parent_id,
                ]);
            $teamEvent = $teamEvent->parent;
        }

        $eventItems = $eventItems->reverse();
        $teamData = $teamData->toArray();
        $teamData['eventItems'] = $eventItems->toArray();
        $eventItemsKeys = $eventItems->pluck('id');
        $teamData['eventItemsKeys'] = $eventItemsKeys;

        return $teamData;
    }

    public function getTeams()
    {
    	$teamList = CompetitionTeam::with('members')->get();
    	foreach ($teamList as $k => $team) {
    		$teamEvent = $team->event;
        	$eventItems = collect([]);
	        while ($teamEvent != null) {
	            $eventItems->push([
	                'id' => $teamEvent->id,
	                'name'   => $teamEvent->name,
	                'parent_id' => $teamEvent->parent_id,
	                ]);
	            $teamEvent = $teamEvent->parent;
	        }

	        $eventItems = $eventItems->reverse();
	        $teamList[$k]['competition_1'] = $eventItems[0]['name'];
	        $teamList[$k]['competition_2'] = $eventItems[1]['name'];
	        $teamList[$k]['competition_3'] = $eventItems[2]['name'];
    	}

    	return $teamList;
    }


    public function makeExcel($filename)
    {

    	$teamList = $this->getTeams();
        Excel::create($filename, function($excel) use($teamList) {

            $excel->setTitle('RoboCom北京赛报名表');
            $excel->setCreator('RoboCom')
                  ->setCompany('RoboCom');
            $excel->setDescription('报名数据');

            $excel->sheet('报名数据', function($sheet) use($teamList) {
            	$sheet->setAutoSize(true);
                $sheet->mergeCells('A1:M1');
                $sheet->mergeCells('N1:W1');
                $sheet->cell('A1', '队伍信息');
                $sheet->cell('N1', '成员信息');
                // 居中
                $sheet->row(1, function($row) {
                    $row->setAlignment('center');
                });
                $sheet->row(2, function($row) {
                    $row->setAlignment('center');
                });

                // 11 Elements
                $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
                $columnKeys = ['invitecode', 'team_no', 'team_name', 'competition_1', 'competition_2', 'competition_3', 'remark',
                                    'contact_name', 'contact_mobile', 'contact_email', 'contact_remark'];

                $sheet->row(2, [ '邀请码', '队伍编号', '队伍名称', '赛事项目', '赛事名称', '组别', '队伍备注',
                				 '联系人', '联系人手机', '联系人邮箱', '联系人备注',
                				 '身份' ,'姓名', '性别', '身高', '学校', '证件类型', '证件号码', '居住省市', '手机号码', '邮箱', '备注']);

                $rowIndex = 3;

                foreach ($teamList as $team) {
                	$memberCount = $team->members->count();
                	$idx = 0;
                	foreach ($team->members as $m) {
                		$sheet->row($rowIndex + $idx++, [
                			'', '', '', '', '', '', '', '', '', '', '',
                			$m['type'] == 'leader' ? '领队教师' : '学生',
                			$m['name'],
                			$m['sex'],
                			$m['height'],
                			$m['work_unit'],
                			$m['idcard_type'],
                			$m['idcard_no'].' ',
                			$m['home_address'],
                			$m['mobile'].' ',
                			$m['email'],
                			$m['remark']
                			]);
                	}


                	for ($i=0; $i < 11; $i++) {
                		$colName = $columns[$i];
                		$keyName = $columnKeys[$i];

                		$sheet->setMergeColumn([
                				'columns' => [$colName],
                				'rows'	  => [
                					[$rowIndex, $rowIndex + $idx],
                				]
                			]);
                        if ($keyName == 'team_no' || $keyName == 'contact_mobile') {
                            $sheet->cell($colName.$rowIndex, $team[$keyName].' ');
                        } else {
                            $sheet->cell($colName.$rowIndex, $team[$keyName]);
                        }

                	}

                	$rowIndex = $rowIndex + $idx + 1;
                }

                $arr = [];
                foreach ($columns as $col) {
                    $arr[$col] = 20;
                }

                $sheet->setWidth($arr);

            });
            //最后一步 导出excel 表格
        })->export('xls');
    }


}
