<?php

namespace App\Admin\Controllers;

use App\Models\CmfSmsSendlist;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSmsSendlistController extends AdminController {

	protected $title = "手机短信";

    public function index(Content $content)
    {
        return $content
            ->header('手机短信')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSmsSendlist());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('result', __('结果'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSmsSendlist());
                $form->text('msg', __('消息'))
                ->creationRules('required|max:200|unique:cmf_sms_sendlist',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->datetime('nowtime', __('现在时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('attime', __('当前时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->number('destcount', __('目标数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('result', __('结果'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('errmsg', __('错误消息'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->number('trytimes', __('尝试次数'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('userid', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('batchid', __('批次ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('destid', __('目标ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('leftcount', __('后退数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('手机短信');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('手机短信')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSmsSendlist());
        return $content
            ->header('手机短信')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSmsSendlist::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('msg', __('消息'));
        $show->field('nowtime', __('现在时间'));
        $show->field('attime', __('当前时间'));
        $show->field('destcount', __('目标数量'));
        $show->field('result', __('结果'));
        $show->field('errmsg', __('错误消息'));
        $show->field('trytimes', __('尝试次数'));
        $show->field('userid', __('用户ID'));
        $show->field('batchid', __('批次ID'));
        $show->field('destid', __('目标ID'));
        $show->field('leftcount', __('后退数量'));
        return $show;
        }
}

?>