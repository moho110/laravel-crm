<?php

namespace App\Admin\Controllers;

use App\Models\CmfSupply;
use App\Models\CmfSupplylinkman;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfGongyingshanggonghuohuizongController extends AdminController {

	protected $title = "供应商供货汇总";

    public function index(Content $content)
    {
        return $content
            ->header('供应商供货汇总')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSupply());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyid', __('供应商编号'));
                $grid->column('supplyname', __('供应商名称'));
                $grid->column('supplyshortname', __('供应商简称'));
                $grid->column('linkman', __('联系人'));
                $grid->column('postalcode', '邮政编码');
                $grid->column('business', __('业务'))->display(function (){
                    return $this->CmfSupplylinkman['business'];});
                $grid->column('businessexpian', __('业务扩展'))->display(function (){
                    return $this->CmfSupplylinkman['businessexpian'];});
                $grid->paginate(10);

                return $grid;
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('供应商供货汇总')
            ->description('详情')
            ->body($this->detail($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSupply::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyid', __('供应商编号'));
        $show->field('supplyname', __('供应商名称'));
        $show->field('supplyshortname', __('供应商简称'));
        $show->field('linkman', __('联系人'));
        $show->field('postalcode', __('邮政编码'));
        $show->field('business', __('业务'))->as(function ($CmfSupplylinkman) {
                return $this->CmfSupplylinkman['business'];
            });
            $show->field('businessexpian', __('业务扩展'))->as(function ($CmfSupplylinkman) {
                return $this->CmfSupplylinkman['businessexpian'];
            });
        return $show;
        }
}

?>