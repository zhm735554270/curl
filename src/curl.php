<?php

namespace kiwi\curl;

class curl{

    public function curl_get($url){

        $header = array(
            'Accept: application/json',
        );
        $curl = curl_init();
        //����ץȡ��url
        curl_setopt($curl, CURLOPT_URL, $url);
        //����ͷ�ļ�����Ϣ��Ϊ���������
        curl_setopt($curl, CURLOPT_HEADER, 0);
        // ��ʱ����,����Ϊ��λ
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);

        // ��ʱ���ã��Ժ���Ϊ��λ
        curl_setopt($curl, CURLOPT_TIMEOUT_MS, 1000 * 60);
        // 301 ����
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        // ��������ͷ
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        //���û�ȡ����Ϣ���ļ�������ʽ���أ�������ֱ�������
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        //ִ������
        $data = curl_exec($curl);

        // ��ʾ������Ϣ
        if (curl_error($curl)) {
            curl_close($curl);
            return "Error: " . curl_error($curl);
        } else {
            // ��ӡ���ص�����
            curl_close($curl);
        }
        return $data;
    }

}