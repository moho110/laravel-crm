<?php

namespace App\Admin\Controllers;

use App\Models\CmfBuyplanmainDetailColor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfBuyplanmainDetailColorController extends AdminController {

	protected $title = "采购计划明细表颜色";

    public function index(Content $content)
    {
        return $content
            ->header('采购计划明细表颜色')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfBuyplanmainDetailColor());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('num', __('数量'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfBuyplanmainDetailColor());
                $form->text('num', __('数量'))
                ->creationRules('required|max:200|unique:cmf_buyplanmain_detail_color',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->color('colors', __('颜色'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('采购计划明细表颜色');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('采购计划明细表颜色')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfBuyplanmainDetailColor());
        return $content
            ->header('采购计划明细表颜色')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfBuyplanmainDetailColor::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('num', __('数量'));
        $show->field('colors', __('颜色'));
        return $show;
        }
}

?>