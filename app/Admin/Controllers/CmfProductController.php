<?php

namespace App\Admin\Controllers;

use App\Models\CmfProduct;
use App\Models\CmfMeasure;
use App\Models\CmfSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfProductController extends AdminController {

	protected $title = "产品";

    public function index(Content $content)
    {
        return $content
            ->header('产品')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfProduct());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('productname', __('产品名称'));
                $grid->column('mode', __('模式'));
                $grid->column('standard', __('标准'));
                $grid->column('producttype', __('产品类型'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfProduct());
                $form->text('productname', __('产品名称'))
                ->creationRules('required|max:200|unique:cmf_product',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('measureid', __('测量名称'))
                ->options(CmfMeasure::pluck('name','id'))
                ->creationRules('required|max:200|integer',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('mode', __('模式'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('standard', __('标准'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('producttype', __('产品类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('storemin', __('最小库存'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('storemax', __('最大库存'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->currency('sellprice', __('销售价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('productcn', __('产品编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('sellprice2', __('销售价格二'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('sellprice3', __('销售价格三'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fileaddress', __('文件地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('oldproductid', __('过往产品ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifkucun', __('是否库存'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('relatefiles', __('相关文件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('supplyid', __('供应商ID'))
                ->options(CmfSupply::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('hascolor', __('含有颜色'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->currency('sellprice4', __('销售价格四'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('产品');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('产品')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfProduct());
        return $content
            ->header('产品')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfProduct::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('productname', __('产品名称'));
        $show->field('measureid', __('测量ID'));
        $show->field('mode', __('模式'));
        $show->field('standard', __('标准'));
        $show->field('producttype', __('产品类型'));
        $show->field('storemin', __('最小库存'));
        $show->field('storemax', __('最大库存'));
        $show->field('user_flag', __('用户标识'));
        $show->field('sellprice', __('销售价格'));
        $show->field('productcn', __('产品编码'));
        $show->field('sellprice2', __('销售价格二'));
        $show->field('sellprice3', __('销售价格三'));
        $show->field('fileaddress', __('文件地址'));
        $show->field('oldproductid', __('过往产品ID'));
        $show->field('ifkucun', __('是否库存'));
        $show->field('relatefiles', __('相关文件'));
        $show->field('supplyid', __('供应商ID'));
        $show->field('hascolor', __('含有颜色'));
        $show->field('sellprice4', __('销售价格四'));
        return $show;
        }
}

?>