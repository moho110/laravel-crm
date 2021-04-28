<?php

namespace App\Admin\Controllers;

use App\Models\CmfBuyplanmain;
use App\Models\CmfBuyplanmainDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCaigouyuanhuizongController extends AdminController {

	protected $title = "采购员汇总";

    public function index(Content $content)
    {
        return $content
            ->header('采购员汇总')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfBuyplanmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('linkman', __('联系人'));
                $grid->column('caigoudate', __('采购日期'));
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->column('prodname', __('产品名称'))->display(function (){
                    return $this->CmfBuyplanmainDetail['prodname'];});
                $grid->column('prodguige', __('产品规格'))->display(function (){
                    return $this->CmfBuyplanmainDetail['prodguige'];});
                $grid->column('prodxinghao', __('产品型号'))->display(function (){
                    return $this->CmfBuyplanmainDetail['prodxinghao'];});
                $grid->actions(function ($actions) {
                    //关闭行操作 删除
                    $actions->disableDelete();
                });
                $grid->paginate(10);

                return $grid;
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('采购员汇总')
            ->description('详情')
            ->body($this->detail($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfBuyplanmain::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('模块编号'));
        $show->field('linkman', __('模块名称'));
        $show->field('caigoudate', __('模块位置'));
        $show->field('createman', __('模块属性'));
        $show->field('createtime', __('显示行号'));
        $show->field('prodname', __('产品名称'))->as(function ($CmfBuyplanmainDetail) {
                return $this->CmfBuyplanmainDetail['prodname'];
            });
        $show->field('prodguige', __('产品规格'))->as(function ($CmfBuyplanmainDetail) {
                return $this->CmfBuyplanmainDetail['prodguige'];
            });
        $show->field('prodxinghao', __('产品型号'))->as(function ($CmfBuyplanmainDetail) {
                return $this->CmfBuyplanmainDetail['prodxinghao'];
            });
        return $show;
        }
}

?>