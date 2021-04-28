<?php

namespace App\Admin\Controllers;

use App\Models\CmfMessage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfMessageController extends AdminController {

	protected $title = "消息";

    public function index(Content $content)
    {
        return $content
            ->header('消息')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfMessage());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('userid', __('用户ID'));
                $grid->column('msgtype', __('消息类型'));
                $grid->column('url', __('URL地址'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfMessage());
                $form->number('userid', __('用户ID'))
                ->creationRules('required|max:200|unique:cmf_message',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('msgtype', __('消息类型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('url', __('URL地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('guanlianid', __('关联ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->datetime('readtime', __('读取时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('flag', __('标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->datetime('attime', __('当前时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('消息');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('消息')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfMessage());
        return $content
            ->header('消息')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfMessage::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('userid', __('用户ID'));
        $show->field('msgtype', __('消息类型'));
        $show->field('content', __('内容'));
        $show->field('url', __('URL地址'));
        $show->field('guanlianid', __('关联ID'));
        $show->field('createtime', __('创建时间'));
        $show->field('readtime', __('读取时间'));
        $show->field('flag', __('标识'));
        $show->field('attime', __('当前时间'));
        return $show;
        }
}

?>