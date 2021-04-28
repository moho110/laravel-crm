<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmPiaojuType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmPiaojuTypeController extends AdminController {

	protected $title = "票据类型";

    public function index(Content $content)
    {
        return $content
            ->header('票据类型')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmPiaojuType());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('billType', __('清单类型'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmPiaojuType());
                $form->text('billType', __('清单类型'))
                ->creationRules('required|max:200|unique:cmf_crm_piaoju_type',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('票据类型');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('票据类型')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmPiaojuType());
        return $content
            ->header('票据类型')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmPiaojuType::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('billType', __('清单类型'));
        return $show;
        }
}

?>