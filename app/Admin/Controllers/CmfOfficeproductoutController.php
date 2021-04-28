<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeproductout;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeproductoutController extends AdminController {

	protected $title = "办公用品出库";

    public function index(Content $content)
    {
        return $content
            ->header('办公用品出库')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeproductout());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('officeName', __('办公用品名称'));
                $grid->column('officeNo', __('办公用品编号'));
                $grid->column('outWarehouse', __('出库'));
                $grid->column('outQuantity', __('出库数量'));
                $grid->column('applyMan ', '申请人');
                $grid->column('isExamine', '是否审核')
                    ->display(function ($isExamine) {
                        return $isExamine ? '是' : '否';
                    });
                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeproductout());
                $form->text('officeName', __('办公用品名称'))
                ->creationRules('required|max:200|unique:cmf_officeproductout',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('officeNo', __('办公用品编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('outWarehouse', __('出库'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('outQuantity', __('出库数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('applyMan', __('申请人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('outStatus', __('出库状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('isExamine', __('是否审核'))->options(['1' => '是','0' => '否'])
                ->rules('required');
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
                ->creationRules('required',['required' => '此项不能为空']);
                $form->currency('price', __('报价'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('quantity', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('count', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('returnLimited', __('归还期限'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('isReturn', __('是否归还'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('returnReiceiver', __('归还人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('realReturnDate', __('实际归还日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('examineTime', __('审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('办公用品出库');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('办公用品出库')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeproductout());
        return $content
            ->header('办公用品出库')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeproductout::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('officeName', __('办公用品名称'));
        $show->field('officeNo', __('办公用品编号'));
        $show->field('outWarehouse', __('出库'));
        $show->field('outQuantity', __('出库数量'));
        $show->field('applyMan', __('申请人'));
        $show->field('outStatus', __('出库状态'));
        $show->field('isExamine', __('是否审核'));
        $show->field('approvalMan', __('批准人'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('price', __('报价'));
        $show->field('quantity', __('数量'));
        $show->field('count', __('金额'));
        $show->field('returnLimited', __('归还期限'));
        $show->field('isReturn', __('是否归还'));
        $show->field('returnReiceiver', __('归还人'));
        $show->field('realReturnDate', __('实际归还日期'));
        $show->field('examineTime', __('审核时间'));
        return $show;
        }
}

?>