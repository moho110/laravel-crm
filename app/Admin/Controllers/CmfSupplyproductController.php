<?php

namespace App\Admin\Controllers;

use App\Models\CmfSupplyproduct;
use App\Models\CmfProduct;
use App\Models\CmfSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSupplyproductController extends AdminController {

	protected $title = "供应商产品";

    public function index(Content $content)
    {
        return $content
            ->header('供应商产品')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSupplyproduct());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('user_id', __('用户ID'));
                $grid->column('supplyname', __('供应商名称'))->display(function (){
                    return $this->CmfSupply['supplyname'];});
                $grid->column('productname', __('产品名称'))->display(function (){
                    return $this->CmfProduct['productname'];});
                $grid->column('productprice', __('产品价格'));
                $grid->column('user_flag', '用户标识')
                    ->display(function ($user_flag) {
                        return $user_flag ? '<span style="color:green;">是</span>' : '<span style="color:red;">否</span>';
                    });

                $grid->column('cycle', '是否回收')
                    ->display(function ($user_flag) {
                        return $user_flag ? '<span style="color:green;">是</span>' : '<span style="color:red;">否</span>';
                    });

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSupplyproduct());
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200|unique:cmf_supplyproduct',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('supplyid', __('供应商ID'))
                ->options(CmfSupply::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('productid', __('产品ID'))
                ->options(CmfProduct::pluck('productname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('productprice', __('产品价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('pricedate', __('报价日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('explianstr', __('STR'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('cycle', __('是否回收'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('fujian', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('供应商产品');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('供应商产品')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSupplyproduct());
        return $content
            ->header('供应商产品')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSupplyproduct::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplyname', __('供应商名称'))->as(function ($CmfSupply) {
                return $this->CmfSupply['supplyname'];
            });
        $show->field('productname', __('产品名称'))->as(function ($CmfProduct) {
                return $this->CmfProduct['productname'];
            });
        $show->field('productprice', __('产品价格'));
        $show->field('pricedate', __('报价日期'));
        $show->field('explianstr', __('STR'));
        
        $show->field('user_flag', __('用户标识'))->as(function($user_flag) {
            if($user_flag == 1) {
                $user_flag='是';
            }else {
                $user_flag='否';
            }
            return $user_flag;
        });

        $show->field('cycle', __('是否回收'))->as(function($cycle) {
            if($cycle == 1) {
                $cycle='是';
            }else {
                $cycle='否';
            }
            return $cycle;
        });
        $show->field('fujian', __('附件'));
        return $show;
        }
}

?>