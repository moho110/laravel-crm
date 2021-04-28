<?php

namespace App\Admin\Controllers;

use App\Models\CmfNotify;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfNotifyController extends AdminController {

	protected $title = "公告通知";

    public function index(Content $content)
    {
        return $content
            ->header('公告通知')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfNotify());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('title', __('标题'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfNotify());
                $form->text('title', __('标题'))
                ->creationRules('required|max:200|unique:cmf_notify',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('to_user', __('发送用户'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('from_user', __('来自用户'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('ATTACHMENT', __('附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifread', __('是否读取'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('ifsms', __('是否发送短信'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('grade', __('等级'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifemail', __('是否发送电子邮件'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('公告通知');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('公告通知')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfNotify());
        return $content
            ->header('公告通知')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfNotify::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('title', __('标题'));
        $show->field('content', __('内容'));
        $show->field('to_user', __('发送用户'));
        $show->field('from_user', __('来自用户'));
        $show->field('ATTACHMENT', __('附件'));
        $show->field('createtime', __('创建时间'));
        $show->field('ifread', __('是否读取'));
        $show->field('ifsms', __('是否发送短信'));
        $show->field('grade', __('等级'));
        $show->field('ifemail', __('是否发送电子邮件'));
        return $show;
        }
}

?>