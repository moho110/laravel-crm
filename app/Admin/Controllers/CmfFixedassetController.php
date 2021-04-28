<?php

namespace App\Admin\Controllers;

use App\Models\CmfDepartment;
use App\Models\CmfFixedasset;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFixedassetController extends AdminController {

	protected $title = "固定资产";

    public function index(Content $content)
    {
        return $content
            ->header('固定资产')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFixedasset());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('setName', __('资产名称'));
                $grid->column('setNo', __('资产编号'));
                $grid->column('setType', __('资产类型'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFixedasset());
                $form->text('setName', __('资产名称'))
                ->creationRules('required|max:200|unique:cmf_fixedasset',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('setNo', __('资产编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('setPichi', __('资产批次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('setType', __('资产类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('purchaseID', __('销售ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('supply', __('供应商'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('department', __('部门'))
                ->options(CmfDepartment::pluck('DEPT_NAME','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('工作人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('size', __('尺寸'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('status', __('状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('quantity', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('count', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('unit', __('单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('place', __('地点'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('purchaseDate', __('买卖日期'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('billNum', __('清单数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('IDNumber', __('ID号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('useDepartment', __('使用部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('useDirect', __('使用方向'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('testDepartment', __('测试部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('dutyMan', __('责任人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('qiyongDate', __('启用日期'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('固定资产');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('固定资产')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFixedasset());
        return $content
            ->header('固定资产')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFixedasset::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('setName', __('资产名称'));
        $show->field('setNo', __('资产编号'));
        $show->field('setPichi', __('资产批次'));
        $show->field('setType', __('资产类型'));
        $show->field('purchaseID', __('销售ID'));
        $show->field('supply', __('供应商'));
        $show->field('department', __('部门'));
        $show->field('person', __('工作人员'));
        $show->field('size', __('尺寸'));
        $show->field('status', __('状态'));
        $show->field('quantity', __('数量'));
        $show->field('price', __('价格'));
        $show->field('count', __('金额'));
        $show->field('unit', __('单位'));
        $show->field('place', __('地点'));
        $show->field('purchaseDate', __('买卖日期'));
        $show->field('billNum', __('清单数量'));
        $show->field('IDNumber', __('ID号码'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('useDepartment', __('使用部门'));
        $show->field('useDirect', __('使用方向'));
        $show->field('testDepartment', __('测试部门'));
        $show->field('dutyMan', __('责任人'));
        $show->field('qiyongDate', __('启用日期'));
        return $show;
        }
}

?>