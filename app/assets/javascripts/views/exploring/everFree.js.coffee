class Mlp.Views.Everfree extends Backbone.View
  
  everfreetemplate: JST['exploring/everfree']
  className: 'everfree-scene'

  events:
    'click .navigate': 'navigate'
    'click #escape': 'triggerEscape'

  initialize: ->
    console.log("initializing everfree")
    @collection.randomReset()
    @everfree = @collection.where in_everfree: true
    @everfree[1].select()
    Mlp.vent.on('everfree:navigated', @render, this)
    

  navigate: (event) ->
    event.preventDefault()
    console.log("navigating")
    direction = event.currentTarget.innerHTML
    new_scene = @collection.navigate(@collection.selected(), direction)
    if $('#chat')[0].innerHTML == ""
      Mlp.vent.trigger('everfree:navigated', new_scene)
    else
      Mlp.vent.trigger('everfree:chat', new_scene)
  
  hideButtons: (everfreeScene) ->
    console.log("hiding buttons...")
    nav_buttons = @$el.find('#nav-buttons')
    nav_buttons.children().each ->
      id = $(this).attr("id")
      console.log(id)
      $(this).addClass('hidden') if not everfreeScene.get("#{id}")
  
  appendEverfreeScene: (setting) =>
    console.log("appending a new setting...")
    console.log(setting)
    view = new Mlp.Views.EverfreeScene(model: setting)
    @$('#everfree-scene').append(view.render().el)
    @hideButtons(setting)


  render: ->
    console.log("rendering everfree")
    $(@el).html(@everfreetemplate())
    @appendEverfreeScene(@collection.selected())
    Mlp.vent.trigger('everfree:rendered', @collection.selected())
    this


  triggerEscape: ->
    Mlp.vent.trigger('action:escape')
