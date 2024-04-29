<?php

class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // defaultのエラーページ返却
            show_404();
        }
        // 渡すデータのキー名で代入する変数を定義するイメージ
        // ucfirstは最初の文字を大文字にする
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}