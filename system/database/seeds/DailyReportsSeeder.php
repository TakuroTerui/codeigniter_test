<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DailyReportsSeeder extends Seeder {

	private $table = 'daily_reports';

	public function run()
	{
		$this->db->truncate($this->table);

		$data = [
			'use_id' => 1,
			'title' => 'a',
			'content' => 'a',
			'reporting_time' => '2000-01-01',
		];
		$this->db->insert($this->table, $data);
	}

}