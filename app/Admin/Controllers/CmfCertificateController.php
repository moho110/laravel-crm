<?php

namespace App\Admin\Controllers;

use App\Models\CmfCertificate;
use App\Models\CmfCertificatetype;
use App\Models\CmfSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCertificateController extends AdminController {

	protected $title = "认证";

    public function index(Content $content)
    {
        return $content
            ->header('认证')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCertificate());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('user_id', __('用户ID'));
                $grid->column('supplyname', __('供应商ID'))->display(function (){
                    return $this->CmfSupply['supplyname'];});
                $grid->column('name', __('认证类型'))->display(function (){
                    return $this->CmfCertificatetype['name'];});
                $grid->column('fromdate', __('日期'));
                $grid->column('enddate', '结束日期');
                
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCertificate());
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200|unique:cmf_certificate',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('supplyid', __('供应商ID'))
                ->options(CmfSupply::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('certificatetype', __('认证类型'))
                ->options(CmfCertificatetype::pluck('name','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('certificateno', __('认证编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('certificateinfo', __('认证信息'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('fromdate', __('日期'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->date('enddate', __('结束日期'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('explianstr', __('字串'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('fileaddress', __('文件地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('认证');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('认证')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCertificate());
        return $content
            ->header('认证')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCertificate::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplyname', __('供应商ID'))->as(function ($CmfSupply) {
                return $this->CmfSupply['supplyname'];
            });
        $show->field('name', __('认证类型'))->as(function ($CmfCertificatetype) {
                return $this->CmfCertificatetype['name'];
            });
        $show->field('certificateno', __('认证编号'));
        $show->field('certificateinfo', __('认证信息'));
        $show->field('fromdate', __('日期'));
        $show->field('enddate', __('结束日期'));
        $show->field('explianstr', __('字串'));
        $show->field('user_flag', __('用户标识'))->as(function($user_flag) {
            if($user_flag == 1) {
                $user_flag='是';
            }else {
                $user_flag='否';
            }
            return $user_flag;
        });
        $show->field('fileaddress', __('文件地址'));
        return $show;
        }
}

?>