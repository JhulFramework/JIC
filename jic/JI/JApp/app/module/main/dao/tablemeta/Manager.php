<?php namespace _m\main\dao\tablemeta;

class Manager extends \Jhul\Components\Database\Manager\_Class
{
	public function __construct()
	{
		foreach ($this->daoClasses() as $context => $param)
		{
			$this->register( $context, $param );
		}
	}

	public function addTableMeta( $context, $table_name, $rowCount )
	{
		return $this->createAndCommit
		(
			$context,

			[
				'table_name' => $table_name,
				'row_count' => $rowCount,
			]
		);
	}

	private function daoClasses()
	{
		return
		[
			'sys' =>
			[
				'class' 	=> '\\_m\\main\\context\\sys\\dao\\TableMeta',
				'select'	=> '*',
			],
		] ;
	}
}
