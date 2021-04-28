<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomerlever;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCustomerleverController extends AdminController {

	protected $title = "客户等级";

    public function index(Content $content)
    {
        return $content
            ->header('客户等级')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCustomerlever());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('name', __('名称'));
                $grid->column('code', __('代码'));
                $grid->column('relatePrice', __('相关价格'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCustomerlever());
                $form->text('name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_customerlever',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->number('user_id', __('用户ID'))
                ->creationRules('required|max:200|unique:cmf_customerlever',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('code', __('代码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '已处理','0' => '未处理'])
                ->rules('required');
                $form->currency('relatePrice', __('相关价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('客户等级');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('客户等级')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCustomerlever());
        return $content
            ->header('客户等级')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCustomerlever::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        $show->field('user_id', __('用户ID'));
        $show->field('code', __('代码'));
        $show->field('user_flag', __('用户标识'))->as(function($user_flag) {
            if($user_flag == 1) {
                $user_flag='已处理';
            }else {
                $user_flag='未处理';
            }
            return $user_flag;
        });
        $show->field('relatePrice', __('相关价格'));
        return $show;
        }
}

?>