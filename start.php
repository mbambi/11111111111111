<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 100;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$true = 0;
$false = 0;
$NotBusiness = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"*ππ₯*",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'ΨΉΨ―Ψ― Ψ§ΩΩΨ­Ψ΅ π° :'.$i,'callback_data'=>'fgf']],
                [['text'=>'ΨΉΨ―Ψ― Ψ§ΩΩΩΨ²Ψ±Ψ§Ψͺ π€ :'.$user,'callback_data'=>'fgdfg']],
                [['text'=>"π°πΆπͺπ²π΅ :$gmail",'callback_data'=>'dfgfd'],['text'=>"ππͺπ±πΈπΈ :$yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'πΆπͺπ²π΅π»πΎ :'.$mailru,'callback_data'=>'fgd'],['text'=>'π±πΈπ½πΆπͺπ²π΅ :'.$hotmail,'callback_data'=>'ghj']],
                [['text'=>'β- ΩΨͺΨ§Ψ­ : '.$true,'callback_data'=>'gj']],
                [['text'=>'β- ΩΩΨ³ ΩΨͺΨ§Ψ­ : '.$false,'callback_data'=>'dghkf']],
                [['text'=>'NOT BUSINESS β :'.$NotBusiness,'callback_data'=>'dgdge']],
            ]
        ])
]);
$se = 1;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false and !is_string($info)) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|yAhoo)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => "β­ πππ πππππππ π­ 
-------------------------------
π‘¦-βΊ π?π¬ππ«π§ππ¦π : [$usern](instagram.com/$usern)
π‘¦-βΊ ππ¦ππ’π₯ : [$mail]
π‘¦-βΊ π©π‘π¨π§π π§π?π¦πππ« : [$phone]
π‘¦-βΊ ππ¨π₯π₯π¨π°ππ«π¬ : $follow
π‘¦-βΊ ππ¨π₯π₯π¨π°π’π§π  : $following
π‘¦-βΊ π©π¨π¬π­ : $media
π‘¦-βΊ π­π’π¦π : " . date('Y/n/j g:i') . "
π‘¦-βΊ ππππ¨π?π§π­ π―ππ«π’ππ’ππ  : false
-------------------------------
ππππ:  @freesimping   γ°οΈ",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>'ΨΉΨ―Ψ― Ψ§ΩΩΨ­Ψ΅ π° :'.$i,'callback_data'=>'fgf']],
                                            [['text'=>'ΨΉΨ―Ψ― Ψ§ΩΩΩΨ²Ψ±Ψ§Ψͺ π€ :'.$user,'callback_data'=>'fgdfg']],
                                            [['text'=>"π°πΆπͺπ²π΅ :$gmail",'callback_data'=>'dfgfd'],['text'=>"ππͺπ±πΈπΈ :$yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'πΆπͺπ²π΅π»πΎ :'.$mailru,'callback_data'=>'fgd'],['text'=>'π±πΈπ½πΆπͺπ²π΅ :'.$hotmail,'callback_data'=>'ghj']],
                                            [['text'=>'β- ΩΨͺΨ§Ψ­ : '.$true,'callback_data'=>'gj']],
                                            [['text'=>'β- ΩΩΨ³ ΩΨͺΨ§Ψ­ : '.$false,'callback_data'=>'dghkf']],
                                            [['text'=>'NOT BUSINESS β :'.$NotBusiness,'callback_data'=>'dgdge']],
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } elseif(is_string($info)){
        bot('sendMessage',[
            'chat_id'=>$id,
            'text'=>"Ψ§ΩΨ­Ψ³Ψ§Ψ¨ - `$screen`\n ΨͺΩ Ψ­ΨΈΨ±Ω ΩΩ *Ψ§ΩΩΨ­Ψ΅*.",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                        [['text'=>'ΩΩΩ Ψ§ΩΩΨ³ΨͺΩ -β','callback_data'=>'moveList&'.$screen]],
                        [['text'=>'Ψ­Ψ°Ω Ψ§ΩΨ­Ψ³Ψ§Ψ¨ -β','callback_data'=>'del&'.$screen]]
                    ]    
            ]),
            'parse_mode'=>'markdown'
        ]);
        exit;
    } else {
        $NotBusiness+=1;
        echo "Not Bussines - $user\n";
    }
    usleep(750000);
    $i++;
    file_put_contents($screen, str_replace($user, '', file_get_contents($screen)));
    file_put_contents($screen, preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", file_get_contents($screen)));
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>'ΨΉΨ―Ψ― Ψ§ΩΩΨ­Ψ΅ π° :'.$i,'callback_data'=>'fgf']],
                    [['text'=>'ΨΉΨ―Ψ― Ψ§ΩΩΩΨ²Ψ±Ψ§Ψͺ π€ :'.$user,'callback_data'=>'fgdfg']],
                    [['text'=>"π°πΆπͺπ²π΅ :$gmail",'callback_data'=>'dfgfd'],['text'=>"ππͺπ±πΈπΈ :$yahoo",'callback_data'=>'gdfgfd']],
                    [['text'=>'πΆπͺπ²π΅π»πΎ :'.$mailru,'callback_data'=>'fgd'],['text'=>'π±πΈπ½πΆπͺπ²π΅ :'.$hotmail,'callback_data'=>'ghj']],
                    [['text'=>'β- ΩΨͺΨ§Ψ­ : '.$true,'callback_data'=>'gj']],
                    [['text'=>'β- ΩΩΨ³ ΩΨͺΨ§Ψ­ : '.$false,'callback_data'=>'dghkf']],
                    [['text'=>'NOT BUSINESS β :'.$NotBusiness,'callback_data'=>'dgdge']],
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"done :".explode(':',$screen)[0]]);

