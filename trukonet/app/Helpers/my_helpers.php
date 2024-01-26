<?php
use CodeIgniter\CodeIgniter;

/**
 * Returns CodeIgniter's version.
 */
function ci_version(): string
{
    return CodeIgniter::CI_VERSION;
}
// MSG
function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
    if ($content != '') {
        return  '<p class="box-msg">
                  <div class="info-box alert-' .$type .'">
                      <div class="info-box-icon">
                          <i class="fa ' .$icon .'"></i>
                      </div>
                      <div class="info-box-content" style="font-size:' .$size .'">
                        ' .$content
                      .'</div>
                  </div>
                </p>';
    }
}

function show_succ_msg($content='', $size='14px') {
    if ($content != '') {
        return   '<p class="box-msg">
                  <div class="info-box alert-success">
                      <div class="info-box-icon">
                          <i class="fa fa-check-circle"></i>
                      </div>
                      <div class="info-box-content" style="font-size:' .$size .'">
                        ' .$content
                      .'</div>
                  </div>
                </p>';
    }
}

function show_err_msg($content='', $size='14px') {
    if ($content != '') {
        return   '<p class="box-msg">
                  <div class="info-box alert-error">
                      <div class="info-box-icon">
                          <i class="fa fa-warning"></i>
                      </div>
                      <div class="info-box-content" style="font-size:' .$size .'">
                        ' .$content
                      .'</div>
                  </div>
                </p>';
    }
}