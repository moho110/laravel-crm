<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeproductin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeproductinController extends AdminController {

	protected $title = "办公用品入库";

    public function index(Content $content)
    {
        return $content
            ->header('办公用品入库')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeproductin());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('officeName', __('办公用品名称'));
                $grid->column('officeNo', __('办公用品编号'));
                $grid->column('inWarehouse', __('入库'));
                $grid->column('inQuantity', __('入库数量'));
                $grid->column('staffMan', '职员');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeproductin());
                $form->text('officeName', __('办公用品名称'))
                ->creationRules('required|max:200|unique:cmf_officeproductin',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('officeNo', __('办公用品编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inWarehouse', __('入库'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inQuantity', __('入库数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staffMan', __('职员'))
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
            $content->header('办公用品入库');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('办公用品入库')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeproductin());
        return $content
            ->header('办公用品入库')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeproductin::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('officeName', __('办公用品名称'));
        $show->field('officeNo', __('办公用品编号'));
        $show->field('inWarehouse', __('入库'));
        $show->field('inQuantity', __('入库数量'));
        $show->field('staffMan', __('职员'));
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