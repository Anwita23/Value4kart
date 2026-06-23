'use strict';

(function ($) {
  if ($('.main-body .page-wrapper').find('.list-container').length) {
    $(document).on('click', '#tablereload', function (event) {
      event.preventDefault();
      $('#dataTableBuilder').DataTable().ajax.reload();
    });
  }

  $('#batchDelete').on('show.bs.modal', function () {
    $('body').addClass('admin-delete-modal-open');
  });
  $('#batchDelete').on('hidden.bs.modal', function () {
    $('body').removeClass('admin-delete-modal-open');
  });

  if (!$('#confirmDelete').length) {
    return;
  }

  var deleteButtonForModal;

  function restoreConfirmButton($submit) {
    var html = $submit.data('defaultConfirmHtml');
    if (html) {
      $submit.html(html);
    }
  }

  $('#confirmDelete').on('show.bs.modal', function (e) {
    deleteButtonForModal = $(e.relatedTarget);
    var modal = $(this);
    var $submit = modal.find('#confirmDeleteSubmitBtn');

    $('body').addClass('admin-delete-modal-open');

    if (!$submit.data('defaultConfirmHtml')) {
      $submit.data('defaultConfirmHtml', $submit.html());
    } else {
      restoreConfirmButton($submit);
    }

    var titleEl = modal.find('#confirmDeleteLabel');
    var messageEl = modal.find('#confirmDeleteMessage');
    var messageSecondaryEl = modal.find('#confirmDeleteMessageSecondary');

    if (deleteButtonForModal && deleteButtonForModal.length) {
      var title = deleteButtonForModal.data('title');
      var message = deleteButtonForModal.data('message');
      var messageSecondary = deleteButtonForModal.data('message-secondary');
      if (title && titleEl.length) titleEl.text(title);
      if (message && messageEl.length) messageEl.text(message);
      if (messageSecondary && messageSecondaryEl.length) {
        messageSecondaryEl.text(messageSecondary).removeClass('d-none').removeAttr('hidden');
      } else if (messageSecondaryEl.length) {
        messageSecondaryEl.addClass('d-none').attr('hidden', '');
      }
    } else {
      if (messageSecondaryEl.length && !messageSecondaryEl.text().trim()) {
        messageSecondaryEl.addClass('d-none').attr('hidden', '');
      }
    }

    $submit
      .attr('data-task', '')
      .removeClass('delete-task-btn is-loading disabled-btn')
      .prop('disabled', false)
      .attr('aria-disabled', 'false');

    var rawId =
      deleteButtonForModal && deleteButtonForModal.length
        ? deleteButtonForModal.attr('data-id')
        : null;
    var delKey =
      deleteButtonForModal && deleteButtonForModal.length
        ? deleteButtonForModal.attr('data-delete')
        : null;
    var isRowDelete =
      delKey &&
      rawId !== undefined &&
      rawId !== null &&
      String(rawId).length > 0;
    var labelIsDelete =
      deleteButtonForModal &&
      deleteButtonForModal.length &&
      deleteButtonForModal.data('label') == 'Delete';

    if (isRowDelete) {
      $submit.addClass('delete-task-btn').attr('data-id', rawId);
    } else if (labelIsDelete && rawId) {
      $submit.addClass('delete-task-btn').attr('data-id', rawId);
    } else {
      $submit.removeClass('delete-task-btn').removeAttr('data-id');
    }

    $submit.show();

    $submit.off('click.deleteConfirm').on('click.deleteConfirm', function () {
      if (!deleteButtonForModal || !deleteButtonForModal.length) {
        return;
      }
      var btn = $(this);
      var del = deleteButtonForModal.attr('data-delete');
      var id = btn.attr('data-id');
      if (!del || id === undefined || id === '') {
        return;
      }
      var deletingLabel =
        typeof jsLang === 'function' ? jsLang('Deleting') : 'Deleting';
      btn.prop('disabled', true).addClass('disabled-btn');
      btn
        .empty()
        .append(
          $('<span class="admin-delete-confirm-progress"></span>').text(
            deletingLabel
          )
        )
        .append(
          $(
            '<span class="spinner-border spinner-border-sm ms-2 align-middle text-light" role="status" aria-hidden="true"></span>'
          )
        );
      $('#delete-' + del + '-' + id).trigger('submit');
      deleteButtonForModal = undefined;
    });
  });

  $('#confirmDelete').on('hidden.bs.modal', function () {
    var $submit = $(this).find('#confirmDeleteSubmitBtn');
    restoreConfirmButton($submit);
    $submit.removeClass('is-loading disabled-btn').prop('disabled', false).attr('aria-disabled', 'false').show();
    $('body').removeClass('admin-delete-modal-open');
  });
})(jQuery);
