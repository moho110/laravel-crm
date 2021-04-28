<?php

namespace App\Admin\Controllers;

use App\Models\CmfWorkreport;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfWorkreportController extends AdminController {

	protected $title = "工作报告";

    public function index(Content $content)
    {
        return $content
            ->header('工作报告')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfWorkreport());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workdate', __('工作日期'));
                $grid->column('shenheren', __('审核人'));
                $grid->column('shenhetime', __('审核时间'));
                $grid->column('state', __('状态'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfWorkreport());
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200|unique:cmf_workreport',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->date('workdate', __('工作日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('shenheren', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('piyu', __('批阅'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->datetime('shenhetime', __('审核时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('工作报告');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('工作报告')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfWorkreport());
        return $content
            ->header('工作报告')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfWorkreport::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('createman', __('创建人'));
        $show->field('workdate', __('工作日期'));
        $show->field('content', __('内容'));
        $show->field('createtime', __('创建时间'));
        $show->field('shenheren', __('审核人'));
        $show->field('piyu', __('批阅'));
        $show->field('shenhetime', __('审核时间'));
        $show->field('state', __('状态'));
        return $show;
        }
}

?>