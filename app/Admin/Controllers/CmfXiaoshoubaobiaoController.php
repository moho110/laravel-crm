<?php

namespace App\Admin\Controllers;

use App\Models\CmfAccessbank;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfXiaoshoubaobiaoController extends AdminController {

	protected $title = "销售日报";

    public function index(Content $content)
    {
        return $content
            ->header('销售日报')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfAccessbank());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('bankid', __('帐号ID'));
                $grid->column('oldjine', __('过往金额'));
                $grid->column('jine', __('金额'));
                $grid->column('opertype', __('操作类型'));
                $grid->column('guanlianbillid', '关联清单ID');                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('销售日报')
            ->description('详情')
            ->body($this->detail($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfAccessbank::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('moduleId', __('模块编号'));
        $show->field('moduleName', __('模块名称'));
        $show->field('modulePosition', __('模块位置'));
        $show->field('moduleAttr', __('模块属性'));
        $show->field('displayLineNumber', __('显示行号'));
        $show->field('scrollDisplay', __('是否滚动显示'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>