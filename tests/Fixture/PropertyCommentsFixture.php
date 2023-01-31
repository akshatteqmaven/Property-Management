<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertyCommentsFixture
 */
class PropertyCommentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'property_id' => 'Lorem ipsum dolor sit amet',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'comments' => 'Lorem ipsum dolor sit amet',
                'created_date' => 1675077833,
                'modified_date' => '2023-01-30 11:23:53',
            ],
        ];
        parent::init();
    }
}
