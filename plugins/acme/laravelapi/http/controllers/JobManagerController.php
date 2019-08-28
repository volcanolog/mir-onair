<?php namespace Acme\LaravelApi\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Wadwettay\Blog\Models\Post;


class JobManagerController extends Controller
{
    public function news_update()
    {
        $token = false;
        $config = Post::all();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev19.mir24.tv/v2/auth",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"request\": \"auth\",\n  \"options\": {\n    \"login\": \"mirmobile\",\n    \"pass\": \"96570fd6a97dc9eaff5e6d751edc8906\"\n  }\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $token = json_decode($response, true)['content']['token'];
        }
        if (!$token) {
            echo 'Authorisation Error: token is empty';
        } else {
            $latestNews = [];
            foreach ($config as $item) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://dev19.mir24.tv/v2/newslist",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n  \"request\": \"newslist\",\n  \"options\": {\n    \"limit\": " . $item['limit'] . ",\n    \"lastNews\": true,\n    \"category\": " . $item['category'] . "\n  },\n  \"token\": \"" . $token . "\"\n}",
                    CURLOPT_HTTPHEADER => array(
                        "Accept: application/json",
                        "Content-Type: application/json"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $latestNews = array_merge($latestNews, json_decode($response, true)['content']);
                }
            }
            DB::beginTransaction();
            try {
                DB::table('wadwettay_blog_latest_news')->delete();
                array_walk($latestNews, function ($value) {
                    $data = [
                        'id' => $value['id'],
                        'title' => $value['title'],
                        'description' => mysql_real_escape_string(sprintf('%s...', substr($value['shortText'], 0, 200))),
                        'image_id' => $value['imageID']
                    ];
                    if (isset($value['videoID'])) {
                        $data['has_video'] = true;
                    }
                    DB::table('wadwettay_blog_latest_news')->insert($data);
                });
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                echo $e->getMessage();
            }
        }
    }
}