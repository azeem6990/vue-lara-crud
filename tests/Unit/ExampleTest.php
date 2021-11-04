<?php

namespace Tests\Unit;
use App\Models\Tel;
use App\Http\Controllers\TelController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function create_tel_record()
    {
        
        $tel = TelController::store([
            'name' => 'shipping',
            'phone' => '455412',
        ]);
        $this->assertTrue(true);
    }

    public function update_tel_record()
    {
        $tel = Tel::find(3);

        if($tel){
            $tel = TelController::update([
                'name' => 'shipping',
                'phone' => '455412',
            ], $tel);
            
            $this->assertTrue(true);
        }
        
    }

    public function delete_tel_record()
    {
        $tel = Tel::find(3);

        if($tel){
            $tel = TelController::destroy($tel);
            $this->assertTrue(true);
        }
        
    }

}
