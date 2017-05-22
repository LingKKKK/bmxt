<?php

namespace Kenrobot\AliPay;

require_once 'alipay-sdk-PHP-20170511115423/AopSdk.php';

use AopClient;
use AlipayTradePrecreateRequest;
use AlipayTradeQueryRequest;

use Kenrobot\AliPay\Models\AliPayLog;

/**
* 支付宝接口
*/
class AliPayDemo
{
    protected $demo = "demo";
    protected $AopClient = null;
    function __construct()
    {
        // $this->sandBoxConfig();
        $this->productionConfig();
    }

    protected function sandBoxConfig()
    {
        $this->aopClient = new AopClient();
        $this->aopClient->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
        $this->aopClient->appId = '2016080700188362';
        $this->aopClient->rsaPrivateKey = 'MIIEogIBAAKCAQEAtKnfjA3t0AANx7Y/19V0viwer5odj7YOQT8AJFcvEA81jeXPBd+xLd03m0nvWGCwtXkNS5I1P6JY6nA4HjV8tUgol/dxUKOoHmyxq+W5pt7C7FQCRcKtIPMpVTYipUoQZVf4QnxqCSIaXvvf0uIdUV7Puc3ogbX4ll3GPA0EG01boNGqzrR4om4bsUnSB94XpwkGSdNlqMHco32kfJf2dAJw+FPS8amm1ryobCQKcs2YEPQNplgk+hJtZDz6pmwM3lbJoPqIgmTQvlXNb3xAN6EoWhj+f6ChNsY3WTGF/bfCGJjW7DU/6IyiE0l9WmO0zVLmWRGewMuqeIHkkNdAVQIDAQABAoIBAB9v3+JzGgqzt7Ik2H8qOaJN8xkDbFlxiJF58QBh22KkAuGqN5gCEMa2U9LFzsxGJvmtEs8vpexox6gj1uAK1qSE5etrt2Ac2khRCamr095hrPGKvMp+0bmGFo8pWGYCuU+pOx32oEzujkAw/AWqKwfZw7PFTMwlahhgQPp6GVjWlhoujWj/8s32w8nXcfU2+YeolLDXM2BWhtaCIoi3FNemX8f++aKtET00Tkhb/JPZL3pOLtybuK/a6IlgwMWVoztIaIHb1ndQFZ1B+db+Au6t6MfDqKfPxMNMoDbevqCiaIsx5fQ0xh+Z2EamoL59nhnCfU45A4RvtuuBEYTKq4ECgYEA6g2JBguV7DDxcvpmJnBg1YoPq+MjEz/xXOc4N5G21Ju0zJmjL0eVZH5C3TmSI7dQOUzrefYx8T6MjqzFNxSkDAP/M9h6yGYgy8oVun9pVIKCV7tRXcWUzqh+20E8M7MazPLYG6wfAFwDpm1a/dN7xHA8PUbOB/AKrFNhSOcYjl0CgYEAxZq4zeW/u0W49ew+XaL2PNiYGXLnLjuyE97o006xaskOWcnXTbICkmPYRH42637AAwI5CfkA0bAg2BDIcIxW74COogixfQ3XcFEEBc5npGV0fVgxTgoK0mWpPr4ZS3sq+9iQ2JC/56IWDPeUABXksW7Dtm880MoJYWJG1kGUqlkCgYAaHfKJUyeimH+I1foqFeYoTeSbyJe0YTE8raxvPvpI1SsinY5BC1rXQOOTLgZpp93y1ut7y4YdJl6m2Q6Uq9/2W0fR8DkbPZIxS1aLXgZR4NJMmeFldlO5j8HAE5J1LmoyLnMA+37mGl5p5s/9fOjVrbR7HfiFmDqIqjEz4l2yHQKBgEsdFUKvIsK9LiHNO6e8Wn2ml6qU0uvwJTEIethYAXjmFF5tKzqNgAzFh2AB2j6KX9LE9Ymk7XrHyLRZLNgbgLBp3c4aH925dTtskGrkmuES78T10Ugo6RQxMLR47oSSvTQejnDEFS6nnlovgkLGD7iisiKXBjcXlZk/Ek4/f5OBAoGAfUijfoj+arPrfida4d7D9iSbffed3rMkJ6nC91iCxE2Z1/H/lRRlC4NB+n/fxraqpe5FdJkCjzKhSnEVp+sNA16bl4GqzV2hKWa4O9H1ZcdCIGSECpLtYCnl82jY2rdi/o8b65l5/uBSjZ8CH23qjh7ny+U3AKagbTz/pwoYV30=';
        $this->aopClient->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzWPch5z5pJ04R9aAXGTF5JrYQmFKqDgxQz5XDfxA5+OobmjZBiblAFRsEciujV7lGzPRTFUBOy/tth8dAZCNWn6uN8dC0sfzQvdLr1eaPtNSw0DlDf/04ZHK6Pasq9NdLW74taC2z+46R2sIaAwpY6seZYM4KFtUFrUND3jNFXt6fRDkTLd+GVICZ1FJdM3FZYKgODw0TSPQvhD5M8N1GEpAIcs7WfGOcdNbk6x1f/FcrPo54szvy6/i1jNHUmANVHZTowhzaprHs16mO94fBm2WpClpb+up3y50lNWChqCB9jtXEGptsx/CDh8nX+OLWfxttMcIINPIacrNfHqz6QIDAQAB';
        $this->aopClient->signType = 'RSA2';
    }

    public function productionConfig()
    {
        $this->aopClient = new AopClient();
        // $this->aopClient->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
        $this->aopClient->appId = '2017051707261563';
        $this->aopClient->rsaPrivateKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC/5gPxw9jB2FNUr8t6c4nwivy+w6XYNJfFViBVsM/OaxyKIcOroPYeuAxMB2cAPCwg1gFl7EGCB01AL277oQxn81B9/YFV/AEwh9hP/83gTjopt5a3wK9Km8bfhPYdWTHpsvEVgD6plY4LCRf8VX8QIgDcgI/t0baFU3zmEXv1dY87j5WDHyIt9Afl9qo3MhJPxGVOj0JUp1g59x+PiLyiHj4sc91RMZ7J8fm4kq+W542JoZWKkJZXNHZ4zifxds/ccDGgUEkacpvJEO/gA4g12RrbDBdSiKRmNe/wteAIf+1HIScczfHptCiDHSgndh6EVwgJn2pcIV2li0Pftw5nAgMBAAECggEAWvSUFAim+aImRTKZuG2BCRFnoKetOOAcu70J0HPg207rlRFR5EyDu6WytmqfyH280Md+nCeyGQaK+AxDh2MbNT4ffcglgHLUwYLx5WEy3MlXSiSpfGkI7M0PIyyrVtfLD6DwIifKC6lGTTa/NqvzcNsdG2aYUbmf0Gv0/Dt3TKzbKFnAT7l20yqLmjcnxwYOLPP0sBB/eE20Avd/uQ8EstRy1DnVeDMbPjLHjVdPREJtKgbVCxZpKsU59D+NRe+zvQBn05HVStuwfW0ASb93AiozE8C29CMxqhZ2AL9/L/Wjc/xNVFfe/YaSQjvZthmr33k6+iLuWjJcoaPC9CepMQKBgQD7wrkHIs1kJ/EHih19BqHxLOiLvYpIgAFaCy5YnW7JQIH9FA3cDztNSM8gcaFErFkwvF91zXGu4SZZeNdHbDfyzT6GBccynvhdy6NVd/nq+FWIUZ6/iCOud4aTaIkjhHsxY9DTgxhHtvRW424Xia302TtNbkjYjZ6uXakBEzHCPwKBgQDDIT3uBWLv+AomBgiUpDb7Qk57NiQTAFNx/hDPDPIKPnOiuYCiluJasOT1YQcnOcH3VLqk9/GImiP/CeyHpn3BdBEJP/uTy0lcKzAog3NA3+pltnN+TbGdYqXEj3Kdc055TRwMnvMPVRgvG0tg3uSz4d76fY4HkvPuFn2J9p7Z2QKBgCBExRJ1E35S4EHnIgB0aS1QZD4E/URto7620Cnrg9envQGDIIOkMCWnv2SZK+JxdL0aZ+Hhg0C2+wNcybsN0937EJh9BRsn5Q2gnD7IMfA8BDqEu6Qw/uHN0CH0tB8pS+D4ujtiAiqu+IJqhCHgM7u+XCuAhzW6cSxINPE+VJJhAoGAYYfbAX51vkX3JJw9a7ZMuPeibJlaHJk8HC0GT8dDr3UZrUsVDa9nAjeKqU9PGP8YgTw7cjtv4XxR46cdL4w7LReLcFknsO6aA1Se5JEXaWTCLwar4YSJ84WcH4wnmKVKovy0uWY1TQOWa+0zlv6xx2ttXTymYgjEnctmAjBfo7kCgYAQguXXepRDbhaU5PUFynEa2rCk7NcFn7iRFpV3zI7Hl1QTOhwpbmVMv48fq4Twczh3uM6244MRWb7B8O9w2Wzzeh8ijZ2W7W4VxhRej8w2JfkQrXvZ/z5bom7ndIZq9kxwfj8jOLCzCfUEJkaLtJU+zIIHcFl0eKUxsMC8+sObHg==';
        $this->aopClient->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAiWnIf7Wm6Kq061gCfggerT1XPyyNjYM8jNTe2vhODc0Wg+hOVcicP2Rkuv3AhVtnZFbZgEaPGmYGTJWQhIWiEsr1OAf6H5c9qiX4eHxAisr8ZQ4Mpa9EVS4bSGtVJtPw+rKpQ+V7nh6K5jCIzEUZgC2bZQ5Gj4thz9daN/YI0O3nucf8O4AG9AFPpmYIBUAWT3lEO2KNEPophD5VZ3gdnEXoieyuV+lKAePrHoI4he9UN7f/98vcPaB7HOwn+dACzUUYghqURZSNu2cKeyCqVu+RSn33FeNrJhlzG3rZHY7QFEOhhAoJ/VAI53TiKbi7ZaEg80vydA8wmvHHvVAuCQIDAQAB';


        $this->aopClient->signType = 'RSA2';

    }

    public function getPayUrl($out_trade_no, $total_amount, $subject)
    {
        $request = new AlipayTradePrecreateRequest ();
        $request->setNotifyUrl('http:://enroll0.kenrobot.com/pay/notify');

        $data = ['out_trade_no' => $out_trade_no,
                'total_amount' => $total_amount,
                'subject' => $subject,
                'body' => $subject];
        $request->setBizContent(json_encode($data));

        // $request->setBizContent('{"product_code":"FAST_INSTANT_TRADE_PAY","out_trade_no":"20150320010101002","subject":"Iphone6 16G","total_amount":"88.88","body":"Iphone6 16G"}');
        //请求
        $result = $this->aopClient->execute($request);
        $result = json_decode(json_encode($result, JSON_UNESCAPED_UNICODE), true);
        if (empty($result) || $result['alipay_trade_precreate_response']['code'] != 10000) {
            return [
                'code' => '-1000',
                'msg' => '错误'
            ];
        }


        $alipayLog = AliPayLog::where('out_trade_no', $out_trade_no)->first();

        if ($alipayLog === null) {
            $alipayLog = new AliPayLog();
            $alipayLog->out_trade_no = $out_trade_no;
            $alipayLog->total_amount = $total_amount;
            $alipayLog->save();
        }

        return $result['alipay_trade_precreate_response'];
    }

   public function queryOrder($out_trade_no)
   {
        $request = new AlipayTradeQueryRequest ();
        $data = ['out_trade_no' => $out_trade_no];

        $request->setBizContent(json_encode($data));
        $result = $this->aopClient->execute ( $request);
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";

        $resultCode = $result->$responseNode->code;

        if(! empty($resultCode) && $resultCode == 10000){
            $dd = (array)$result->$responseNode;
            $alipayLog = AliPayLog::where('out_trade_no', $out_trade_no)->first();
            if (!$alipayLog) {
                $alipayLog = new AliPayLog();
            }
            // dd($dd);

            if ($dd['trade_status'] == 'TRADE_SUCCESS') {
                $pay_data = array_only($dd, ['buyer_logon_id', 'buyer_pay_amount', 'buyer_user_id', 'invoice_amount', 'openid', 'out_trade_no',
                        'point_amount', 'receipt_amount', 'send_pay_date', 'total_amount', 'trade_no', 'trade_status', 'attach']);

                $alipayLog->fill($pay_data)->save();
            }


            // dd($dd);

            return (array) $result->$responseNode;
        } else {
            return [
                'code' => '-1000',
                'msg' => '错误'
            ];
        }

   }
}
