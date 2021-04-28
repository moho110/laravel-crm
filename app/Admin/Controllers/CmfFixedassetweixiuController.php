<?php

namespace App\Admin\Controllers;

use App\Models\CmfFixedassetweixiu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFixedassetweixiuController extends AdminController {

	protected $title = "固定资产维修";

    public function index(Content $content)
    {
        return $content
            ->header('固定资产维修')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFixedassetweixiu());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('setName', __('资产名称'));
                $grid->column('setNo', __('资产编号'));
                $grid->column('inDepartment', __('所属部门'));
                $grid->column('approvalMan', __('批准人'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFixedassetweixiu());
                $form->text('setName', __('资产名称'))
                ->creationRules('required|max:200|unique:cmf_fixedassetweixiu',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('setNo', __('资产编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inDepartment', __('所属部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('repairUnit', __('维修单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('repairMan', __('维修人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('thingIntro', __('简介'))
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
                $form->datetime('creatTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
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
            $content->header('固定资产维修');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('固定资产维修')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFixedassetweixiu());
        return $content
            ->header('固定资产维修')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFixedassetweixiu::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('setName', __('资产名称'));
        $show->field('setNo', __('资产编号'));
        $show->field('inDepartment', __('所属部门'));
        $show->field('repairUnit', __('维修单位'));
        $show->field('repairMan', __('维修人'));
        $show->field('thingIntro', __('简介'));
        $show->field('approvalMan', __('批准人'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('creatTime', __('创建时间'));
        $show->field('price', __('价格'));
        $show->field('quantity', __('数量'));
        $show->field('count', __('金额'));
        return $show;
        }
}

?>