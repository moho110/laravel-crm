<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeproducttiaoku;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeproducttiaokuController extends AdminController {

	protected $title = "办公用品调库";

    public function index(Content $content)
    {
        return $content
            ->header('办公用品调库')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeproducttiaoku());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('officeName', __('办公用品名称'));
                $grid->column('officeNo', __('办公用品编号'));
                $grid->column('transferQuantity', __('调库数量'));
                $grid->column('approvalMan', __('批准人'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeproducttiaoku());
                $form->text('officeName', __('办公用品名称'))
                ->creationRules('required|max:200|unique:cmf_officeproducttiaoku',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('officeNo', __('办公用品编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('transferOutWarehouse', __('转移出库'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('transferInWarehouse', __('转移入库'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('transferQuantity', __('转移数量'))
                ->creationRules('required|max:2|unique:cmf_crm_mytable',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->radio('staffMan', __('职员'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('approvalMan', __('批准人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('memo', __('备注'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->textarea('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('creatTime', __('创建时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('price', __('报价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('quantity', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('count', __('金额'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('isExamine', __('是否审核'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('exTime', __('审核时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('办公用品调库');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('办公用品调库')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeproducttiaoku());
        return $content
            ->header('办公用品调库')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeproducttiaoku::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('officeName', __('办公用品名称'));
        $show->field('officeNo', __('办公用品编号'));
        $show->field('transferOutWarehouse', __('转移出库'));
        $show->field('transferInWarehouse', __('转移入库'));
        $show->field('transferQuantity', __('转移数量'));
        $show->field('staffMan', __('职员'));
        $show->field('approvalMan', __('批准人'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('creatTime', __('创建时间'));
        $show->field('price', __('报价'));
        $show->field('quantity', __('数量'));
        $show->field('count', __('金额'));
        $show->field('isExamine', __('是否审核'));
        $show->field('exTime', __('审核时间'));
        return $show;
        }
}

?>