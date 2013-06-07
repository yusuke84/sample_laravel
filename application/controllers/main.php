<?php

class Main_Controller extends Base_Controller {

	public function action_index()
	{
        return View::make('main/index',$this->basedata);

	}

    public function action_search()
    {
        $input = Input::all();
        $rules = array(
            'keyword' => 'required',
            'date' => 'match:/^(\d{4}\d{2}(\d{2})?)?$/'
            );

        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return Redirect::to('main/index')->with_errors($validation);

        }else{

            $param1 = '';
            $param2 = '';
            $param3 = '';

            $keyword = str_replace(' ',',',$input['keyword']);

            $input['area'] != '' ? $param1 = $keyword.','.$input['area'] : $param1 = $keyword;
            strlen($input['date']) == 6 ? $param2 = $input['date'] : $param3 = $input['date'];
            Log::write('url','http://api.atnd.org/events/?keyword_or='.$param1.'&ym='.$param2.'&ymd='.$param3.'&format=json');
            New Curl();
            $curl =
            $resultAtnd = json_decode($curl->simple_get('http://api.atnd.org/events/?keyword='.$param1.'&ym='.$param2.'&ymd='.$param3.'&format=json'.'&count=100'));
            $contentdata = $this->basedata;
            $contentdata['keyword'] = $input['keyword'];
            $contentdata['area'] = $input['area'];
            $contentdata['date'] = $input['date'];

            array_key_exists('nogoback',$input) ? $contentdata['nogoback'] = true : $contentdata['nogoback'] = false;

            $resultArray = $resultAtnd->events;
            $date = new Datetime();
            $cnt = 0;
            for($i = 0;$i < $resultAtnd->results_returned;$i++){
                if(!(array_key_exists('nogoback',$input) && $date->format('Y-m-d') > substr($resultArray[$i]->started_at,0,10))){
                    $tmep = array(
                        'date' => substr($resultArray[$i]->started_at,0,10),
                        'title' => $resultArray[$i]->title,
                        'recruiting' => $resultArray[$i]->accepted+$resultArray[$i]->waiting.' / '.$resultArray[$i]->limit,
                        'url' => $resultArray[$i]->event_url,
                        'owner' => $resultArray[$i]->owner_nickname,
                        'ownerurl' => 'http://atnd.org/users/'.$resultArray[$i]->owner_id
                    );
                    $contentdata['results'][$cnt] = $tmep;
                    $cnt++;
                }

            }

            $contentdata['number'] = ' --- '.$cnt.'件';

            return View::make('main/index',$contentdata);

        }

    }

}