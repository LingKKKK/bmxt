<?php

namespace Kenrobot\AliPay;

require_once 'alipay-sdk-PHP-20170511115423/AopSdk.php';

use AopClient;
use AlipayTradePrecreateRequest;

/**
* 支付宝接口
*/
class AliPayDemo
{
    protected $demo = "demo";
    protected $AopClient = null;
    function __construct()
    {
        $this->aopClient = new AopClient();
        $this->aopClient->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
        $this->aopClient->appId = '2016080700188362';
        $this->aopClient->rsaPrivateKey = 'MIIEogIBAAKCAQEAtKnfjA3t0AANx7Y/19V0viwer5odj7YOQT8AJFcvEA81jeXPBd+xLd03m0nvWGCwtXkNS5I1P6JY6nA4HjV8tUgol/dxUKOoHmyxq+W5pt7C7FQCRcKtIPMpVTYipUoQZVf4QnxqCSIaXvvf0uIdUV7Puc3ogbX4ll3GPA0EG01boNGqzrR4om4bsUnSB94XpwkGSdNlqMHco32kfJf2dAJw+FPS8amm1ryobCQKcs2YEPQNplgk+hJtZDz6pmwM3lbJoPqIgmTQvlXNb3xAN6EoWhj+f6ChNsY3WTGF/bfCGJjW7DU/6IyiE0l9WmO0zVLmWRGewMuqeIHkkNdAVQIDAQABAoIBAB9v3+JzGgqzt7Ik2H8qOaJN8xkDbFlxiJF58QBh22KkAuGqN5gCEMa2U9LFzsxGJvmtEs8vpexox6gj1uAK1qSE5etrt2Ac2khRCamr095hrPGKvMp+0bmGFo8pWGYCuU+pOx32oEzujkAw/AWqKwfZw7PFTMwlahhgQPp6GVjWlhoujWj/8s32w8nXcfU2+YeolLDXM2BWhtaCIoi3FNemX8f++aKtET00Tkhb/JPZL3pOLtybuK/a6IlgwMWVoztIaIHb1ndQFZ1B+db+Au6t6MfDqKfPxMNMoDbevqCiaIsx5fQ0xh+Z2EamoL59nhnCfU45A4RvtuuBEYTKq4ECgYEA6g2JBguV7DDxcvpmJnBg1YoPq+MjEz/xXOc4N5G21Ju0zJmjL0eVZH5C3TmSI7dQOUzrefYx8T6MjqzFNxSkDAP/M9h6yGYgy8oVun9pVIKCV7tRXcWUzqh+20E8M7MazPLYG6wfAFwDpm1a/dN7xHA8PUbOB/AKrFNhSOcYjl0CgYEAxZq4zeW/u0W49ew+XaL2PNiYGXLnLjuyE97o006xaskOWcnXTbICkmPYRH42637AAwI5CfkA0bAg2BDIcIxW74COogixfQ3XcFEEBc5npGV0fVgxTgoK0mWpPr4ZS3sq+9iQ2JC/56IWDPeUABXksW7Dtm880MoJYWJG1kGUqlkCgYAaHfKJUyeimH+I1foqFeYoTeSbyJe0YTE8raxvPvpI1SsinY5BC1rXQOOTLgZpp93y1ut7y4YdJl6m2Q6Uq9/2W0fR8DkbPZIxS1aLXgZR4NJMmeFldlO5j8HAE5J1LmoyLnMA+37mGl5p5s/9fOjVrbR7HfiFmDqIqjEz4l2yHQKBgEsdFUKvIsK9LiHNO6e8Wn2ml6qU0uvwJTEIethYAXjmFF5tKzqNgAzFh2AB2j6KX9LE9Ymk7XrHyLRZLNgbgLBp3c4aH925dTtskGrkmuES78T10Ugo6RQxMLR47oSSvTQejnDEFS6nnlovgkLGD7iisiKXBjcXlZk/Ek4/f5OBAoGAfUijfoj+arPrfida4d7D9iSbffed3rMkJ6nC91iCxE2Z1/H/lRRlC4NB+n/fxraqpe5FdJkCjzKhSnEVp+sNA16bl4GqzV2hKWa4O9H1ZcdCIGSECpLtYCnl82jY2rdi/o8b65l5/uBSjZ8CH23qjh7ny+U3AKagbTz/pwoYV30=';
        $this->aopClient->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzWPch5z5pJ04R9aAXGTF5JrYQmFKqDgxQz5XDfxA5+OobmjZBiblAFRsEciujV7lGzPRTFUBOy/tth8dAZCNWn6uN8dC0sfzQvdLr1eaPtNSw0DlDf/04ZHK6Pasq9NdLW74taC2z+46R2sIaAwpY6seZYM4KFtUFrUND3jNFXt6fRDkTLd+GVICZ1FJdM3FZYKgODw0TSPQvhD5M8N1GEpAIcs7WfGOcdNbk6x1f/FcrPo54szvy6/i1jNHUmANVHZTowhzaprHs16mO94fBm2WpClpb+up3y50lNWChqCB9jtXEGptsx/CDh8nX+OLWfxttMcIINPIacrNfHqz6QIDAQAB';
        $this->aopClient->signType = 'RSA2';
    }

    public function getPayUrl()
    {
        $request = new AlipayTradePrecreateRequest ();
        $request->setNotifyUrl('http:://enroll0.kenrobot.com/pay/notify');

        $data = ['out_trade_no' => '20150320010101002',
                'total_amount' => '88.88',
                'subject' => 'iPhone6 16G',
                'body' => 'iPhone6 16G '];
        $request->setBizContent(json_encode($data));

        // $request->setBizContent('{"product_code":"FAST_INSTANT_TRADE_PAY","out_trade_no":"20150320010101002","subject":"Iphone6 16G","total_amount":"88.88","body":"Iphone6 16G"}');
        //请求
        $result = $this->aopClient->execute($request);
        return $result;
    }

    public function getFormPayUrl()
    {

    }
}
