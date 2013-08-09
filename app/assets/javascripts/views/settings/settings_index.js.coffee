class Mlp.Views.SettingsIndex extends Backbone.View

  template: JST['settings/index']

  events:
    'submit #new_setting': 'createSetting'
    'click #change_of_venue': 'randomSetting'

  initialize: ->
    @collection.randomSetting()
    Mlp.vent.on('click', @rideIn, this)
    @collection.on('reset', @render, this)
    @collection.on('add', @appendSetting, this)
    @collection.on('change', @render, this)

  rideIn: (model) ->
    event.preventDefault()
    console.log(model)

  createSetting: (event) ->
    event.preventDefault() 

    attributes = 
      name: $('#new_setting_name').val()
      img_url: $('#new_setting_img_url').val()

    options =
      wait: true
      error: @handleError    

    @collection.create attributes, options

  randomSetting: (event) ->
    event.preventDefault() if event
    @collection.randomReset()
    @collection.randomSetting()

  appendSetting: (setting) =>
    view = new Mlp.Views.Setting(model: setting)
    @$('#setting').append(view.render().el)

  render: ->
    $(@el).html(@template())
    @collection.each(@appendSetting)
    this


