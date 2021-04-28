<?php

namespace App\Admin\Controllers;

use App\Models\CmfComment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCommentController extends AdminController {

	protected $title = "评论表";

    public function index(Content $content)
    {
        return $content
            ->header('评论表')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfComment());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('create_time', __('评论时间'));
                $grid->column('delete_time', __('删除时间'));
                $grid->column('floor', __('楼层数'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfComment());
                $form->text('parent_id', __('父级ID'))
                ->creationRules('required|max:200|unique:cmf_comment',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('to_user_id', __('发送用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('object_id', __('对象ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('like_count', __('喜欢数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('dislike_count', __('不喜欢数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('floor', __('楼层数'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('create_time', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->datetime('delete_time', __('删除时间'))
                ->creationRules('required', ['required' => '此项不能为空']);
                $form->radio('status', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->text('type', __('类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('table_name', __('表名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('full_name', __('全名'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->email('email', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('path', __('路径'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->url('url', __('URL地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('more', __('更多'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('评论表');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('评论表')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfComment());
        return $content
            ->header('评论表')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfComment::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('parent_id', __('父级ID'));
        $show->field('user_id', __('用户ID'));
        $show->field('to_user_id', __('发送用户ID'));
        $show->field('object_id', __('对象ID'));
        $show->field('like_count', __('喜欢数量'));
        $show->field('dislike_count', __('不喜欢数量'));
        $show->field('floor', __('楼层数'));
        $show->field('create_time', __('创建时间'));
        $show->field('delete_time', __('删除时间'));
        $show->field('status', __('状态'));
        $show->field('type', __('类型'));
        $show->field('table_name', __('表名称'));
        $show->field('full_name', __('全名'));
        $show->field('email', __('电子邮件'));
        $show->field('path', __('路径'));
        $show->field('url', __('URL地址'));
        $show->field('content', __('内容'));
        $show->field('more', __('更多'));
        return $show;
        }
}

?>