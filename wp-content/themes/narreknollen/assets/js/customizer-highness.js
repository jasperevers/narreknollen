(function ($, api) {
    'use strict';
    api.bind('ready', function () {
        var control = api.control('highness_people');
        if (!control) { return; }
        control.deferred.embedded.done(function () {
        var list = control.container.find('.highness-people-list');
        var people = control.setting.get();
        if (typeof people === 'string') {
            try { people = JSON.parse(people); } catch (e) { people = []; }
        }
        if (!Array.isArray(people)) { people = []; }
        // Keep editable rows separate from the setting so WordPress detects changes.
        people = people.map(function (person) {
            return { role: person.role || '', name: person.name || '' };
        });
        function save() {
            var value = JSON.stringify(people.map(function (person) {
                return { role: person.role, name: person.name };
            }));
            control.container.find('.highness-people-value').val(value).trigger('change');
            control.setting.set(value);
        }
        function render() {
            list.empty();
            people.forEach(function (person, index) {
                var row = $('<div>').css({padding: '12px', marginBottom: '10px', border: '1px solid #ccc'});
                $('<strong>').text('Persoon ' + (index + 1)).appendTo(row);
                [['role', 'Rol (bijvoorbeeld Prinses of Adjudant)'], ['name', 'Naam']].forEach(function (field) {
                    var label = $('<label>').css({display: 'block', marginTop: '8px'}).text(field[1]);
                    $('<input>', {type: 'text'}).val(person[field[0]] || '').css('width', '100%').on('input', function () {
                        person[field[0]] = $(this).val();
                        save();
                    }).appendTo(label);
                    label.appendTo(row);
                });
                $('<button>', {type: 'button', class: 'button-link-delete'}).text('Persoon verwijderen').css('margin-top', '10px').on('click', function () {
                    people.splice(index, 1);
                    save();
                    render();
                    control.container.find('.highness-add-person').trigger('focus');
                }).appendTo(row);
                row.appendTo(list);
            });
        }
        control.container.find('.highness-add-person').on('click', function () {
            people.push({role: '', name: ''});
            save();
            render();
            list.children().last().find('input').first().trigger('focus');
        });
        render();
    });
    });
})(jQuery, wp.customize);
