<?php

namespace App\Admin\Controllers;

use App\Models\CmfFixedassettiaoku;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFixedassettiaokuController extends AdminController {

	protected $title = "固定资产调库";

    public function index(Content $content)
    {
        return $content
            ->header('固定资产调库')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFixedassettiaoku());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('setName', __('资产名称'));
                $grid->column('setNo', __('资产编号'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFixedassettiaoku());
                $form->text('setName', __('资产名称'))
                ->creationRules('required|max:200|unique:cmf_fixedassettiaoku',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('setNo', __('资产编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('oriInDepartment', __('原所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('nowInDepartment', __('现所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('approvalMan', __('批准人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->currency('price', __('价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('quantity', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('count', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('固定资产调库');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('固定资产调库')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFixedassettiaoku());
        return $content
            ->header('固定资产调库')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFixedassettiaoku::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('setName', __('资产名称'));
        $show->field('setNo', __('资产编号'));
        $show->field('oriInDepartment', __('原所在部门'));
        $show->field('nowInDepartment', __('现所在部门'));
        $show->field('approvalMan', __('批准人'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('price', __('价格'));
        $show->field('quantity', __('数量'));
        $show->field('count', __('金额'));
        return $show;
        }
}

?>