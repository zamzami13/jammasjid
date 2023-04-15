<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    
    public function index()
    {
        $this->load->helper('url');

        function UniqueMachineID() {  

            $is_device = '';
            $exec = '';
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {  
                $is_device = 'desktop';
                $mac = exec('getmac');
                // $mac = strtok($mac, ' ');
                $exec = $mac;
            }

            if (strtoupper(PHP_OS) === 'LINUX') {  
                //linux
                $grep = shell_exec("ifconfig -a | grep -Po 'ether \K.*$'");    
                $exp = explode(PHP_EOL, $grep);

                $is_device = 'desktop';
                $mac = '';
                if (count($exp) > 0) {
                    foreach ($exp as $key => $val) {
                        if ($val != "") {
                            $mac = substr($val, 0, 17);
                            break;
                        }
                    }
                }

                /*
                    ob_start(); // Turn on output buffering
                    system('ifconfig'); //Execute external program to display output
                    $mycom    = ob_get_contents(); // Capture the output into a variable
                    ob_clean(); // Clean (erase) the output buffer
                    $pmac     = strpos($mycom, 'ether'); // Find the position of Physical text
                    $mac      = substr($mycom, ($pmac + 6), 17);
                */

                $exec = shell_exec("ifconfig");
            }

            return ['mac' => $mac, 'device' => $is_device, 'exec' => $exec]; 
        }

        // $device = ['windows', 'android', 'ipad', 'iphone', 'x11'];
        $client_device = ['mobile', 'tablet'];
        $is_client_device = 'desktop';
        foreach ($client_device as $key => $val) {
            if (strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), $val)) {
                $is_client_device = $val;
                break;
            }
        }
        
        $server = [
            'server' => [
                'ip' => $_SERVER['SERVER_NAME'],
                'domain' => $_SERVER['HTTP_HOST'],
                'mac_address' => UniqueMachineID()['mac'],
                'os' => strtolower(PHP_OS),
                'is_device' => strtolower(UniqueMachineID()['device']),
                'client' => [
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'is_device' => strtolower($is_client_device),
                    'user_agent' => $_SERVER["HTTP_USER_AGENT"],
                    'x_uuid' => '2750bc42-702e-4cbe-bae5-798f171389e1',
                    'x_platform' => 'linux',
                    'x_os' => 'linux 64',
                    'x_browser' => 'chrome-105.0.0.0',
                    'x_resolution' => [
                        'width' => 1920,
                        'height' => 1080,
                    ],
                ]
            ], 
        ];

        $server_str = json_encode($server);
        trace($server, false);
        $data['server'] = $server_str; 
        $data['exec'] = UniqueMachineID()['exec']; 

        // $this->load->view('client', $data);
    }
}
