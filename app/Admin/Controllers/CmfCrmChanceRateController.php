<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmChanceRate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmChanceRateController extends AdminController {

	protected $title = "销售机会成功率";

    public function index(Content $content)
    {
        return $content
            ->header('销售机会成功率')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmChanceRate());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('enable', __('可能性'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmChanceRate());
                $form->text('enable', __('可能性'))
                ->creationRules('required|max:200|unique:cmf_crm_chance_rate',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('销售机会成功率');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('销售机会成功率')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmChanceRate());
        return $content
            ->header('销售机会成功率')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmChanceRate::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('enable', __('可能性'));
        return $show;
        }
}

?>