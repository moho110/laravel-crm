<?php

namespace App\Admin\Controllers;

use App\Models\CmfEmail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEmailController extends AdminController {

	protected $title = "发送邮件";

    public function index(Content $content)
    {
        return $content
            ->header('发送邮件')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEmail());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('FROM_ID', __('发送ID'));
                $grid->column('SEND_TIME', __('发送时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEmail());
                $form->number('FROM_ID', __('来自ID'))
                ->creationRules('required|max:200|unique:required',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('customers', __('客户'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplys', __('提供者'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('others', __('其他'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('SUBJECT', __('主题'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('CONTENT', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('SEND_TIME', __('发送时间'))
                ->creationRules('required', ['required' => '发送时间不能为空']);
                $form->text('ATTACHMENT_ID', __('附件ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('ATTACHMENT_NAME', __('附件名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('SEND_FLAG', __('发送标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('发送邮件');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('发送邮件')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEmail());
        return $content
            ->header('发送邮件')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEmail::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('FROM_ID', __('来自ID'));
        $show->field('customers', __('客户'));
        $show->field('supplys', __('提供者'));
        $show->field('others', __('其他'));
        $show->field('SUBJECT', __('主题'));
        $show->field('CONTENT', __('内容'));
        $show->field('SEND_TIME', __('发送时间'));
        $show->field('ATTACHMENT_ID', __('附件ID'));
        $show->field('ATTACHMENT_NAME', __('附件名称'));
        $show->field('SEND_FLAG', __('发送标识'));
        return $show;
        }
}

?>