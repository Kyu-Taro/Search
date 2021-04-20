<?php

namespace App\Services;

use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;

class ContactFormService
{

    /**
     * contact_formsテーブルのIDとユーザーネームを取得
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index($search) : \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = DB::table('contact_forms');

        if($search !== null) {
            //全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split);

            //単語をループさせてwhereの条件を作成する
            foreach($search_split2 as $value) {
                $query->where('your_name', 'like', '%' . $value . '%');
            }
        }

        $data = $query->select('id', 'your_name')
                ->orderBy('created_at', 'asc')->paginate(20);

        return $data;
    }

    /**
     * 新規レコードを作成
     *
     * @param array $value
     * @return void
     */
    public function store(array $value) : void
    {
        $contact_form = new ContactForm;

        $contact_form->your_name = $value['your_name'];
        $contact_form->title = $value['title'];
        $contact_form->email = $value['email'];
        $contact_form->url = $value['url'];
        $contact_form->gender = $value['gender'];
        $contact_form->age = $value['age'];
        $contact_form->contact = $value['contact'];

        $contact_form->save();

    }

    /**
     * 指定されたIDのレコードを取得(性別、年齢を文字列に変換)
     *
     * @param integer $id
     * @return \App\Models\ContactForm
     */
    public function show(int $id) : \App\Models\ContactForm
    {
        $contact = ContactForm::find($id);

        if($contact->gender === 0) {
            $contact->gender = '男性';
        }

        if($contact->gender === 1) {
            $contact->gender = '女性';
        }

        if($contact->age === 1) {
            $contact->age = '〜19歳';
        }

        if($contact->age === 2) {
            $contact->age = '20歳〜29歳';
        }

        if($contact->age === 3) {
            $contact->age = '30歳〜39歳';
        }

        if($contact->age === 4) {
            $contact->age = '40歳〜49歳';
        }

        if($contact->age === 5) {
            $contact->age = '50歳〜59歳';
        }

        if($contact->age === 6) {
            $contact->age = '60歳〜';
        }

        return $contact;
    }

    /**
     * 指定されたレコードを取得
     *
     * @param integer $id
     * @return \App\Models\ContactForm
     */
    public function edit(int $id) : \App\Models\ContactForm
    {
        $contact = ContactForm::find($id);
        return $contact;
    }

    /**
     * 指定されたレコードの更新
     *
     * @param array $request
     * @param integer $id
     * @return void
     */
    public function update(array $request,int $id) : void
    {
        $contact = ContactForm::find($id);

        $contact->your_name = $request['your_name'];
        $contact->title = $request['title'];
        $contact->email = $request['email'];
        $contact->url = $request['url'];
        $contact->gender = $request['gender'];
        $contact->age = $request['age'];
        $contact->contact = $request['contact'];

        $contact->save();
    }

    /**
     * 指定したレコードの削除
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id) : void
    {
        $contact = ContactForm::find($id);
        $contact->delete();
    }
}
