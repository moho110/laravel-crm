<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomer;
use App\Models\CmfCrmChance;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfChanpinxiaoshouhuizongController extends AdminController {

	protected $title = "产品销售汇总";

    public function index(Content $content)
    {
        return $content
            ->header('产品销售汇总')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmChance());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('chanceTheme', __('机会主题'));
                $grid->column('clientName', __('客户名称'));
                $grid->column('linkMan', __('联系人'));
                $grid->column('findTime', __('发现时间'));
                $grid->column('creator', '创建人');                
                $grid->column('createTime', __('创建时间'));
                $grid->column('supplyid', __('供应商编号'))->display(function (){
                    return $this->CmfCustomer['supplyid'];});
                $grid->column('supplyname', __('供应商名称'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('postalcode', __('邮政编码'))->display(function (){
                    return $this->CmfCustomer['postalcode'];});
                $grid->paginate(10);

                return $grid;
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('产品销售汇总')
            ->description('详情')
            ->body($this->detail($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmChance::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('chanceTheme', __('机会主题'));
        $show->field('clientName', __('客户名称'));
        $show->field('linkMan', __('联系人'));
        $show->field('findTime', __('发现时间'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('supplyid', __('供应商编号'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyid'];
            });
        $show->field('supplyname', __('供应商名称'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('postalcode', __('邮政编码'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['postalcode'];
            });
        return $show;
        }
}

?>