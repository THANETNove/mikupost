<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServeApiClassController extends Controller
{

   
   /*  public function update(Request $request, string $id)
    {
        //
    } */

    public function update($newVal)
    {
   
        // อัปเดตค่า $retVal ตามค่าใหม่ที่รับเข้ามา
        $retVal = $newVal;
        $service = "service-body-cover";
        $serviceList = "service-body-cover-list";
        $coverPage =  "cover-page";
        $coverPageList =  "cover-page-list";
        
        $setService =  ($retVal == "noList") ? $service : $serviceList ;
        $setCoverPage =  ($retVal == "noList") ? $coverPage : $coverPageList ;

        // ส่งค่า $retVal กลับเป็น JSON
        $data = [$setService,$setCoverPage];
        return  $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}