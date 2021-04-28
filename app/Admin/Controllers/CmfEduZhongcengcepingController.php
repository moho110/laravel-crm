<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduZhongcengceping;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduZhongcengcepingController extends AdminController {

	protected $title = "中层测评";

    public function index(Content $content)
    {
        return $content
            ->header('中层测评')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduZhongcengceping());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('testName', __('测试名称'));
                $grid->column('startTime', __('开始时间'));
                $grid->column('endTime', __('结束时间'));                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduZhongcengceping());
                $form->text('testName', __('评测名称'))
                ->creationRules('required|max:200|unique:cmf_edu_zhongcengceping',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->datetime('startTime', __('开始时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->datetime('endTime', __('结束时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->radio('isUse', __('是否使用'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('testManby', __('评测人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('joinTestMan', __('参加评测人员'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('中层测评');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('中层测评')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduZhongcengceping());
        return $content
            ->header('中层测评')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduZhongcengceping::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('testName', __('评测名称'));
        $show->field('startTime', __('开始时间'));
        $show->field('endTime', __('结束时间'));
        $show->field('isUse', __('是否使用'));
        $show->field('testManby', __('被评测人'));
        $show->field('joinTestMan', __('参加评测人员'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>