class Mlp.Views.Action extends Backbone.View
    template: JST['action']


    initialize: ->
      Mlp.vent.on('everfree:rendered', @positionHeroine, this)
      Mlp.vent.on('everfree:rendered', @positionCameo, this)

    render: =>
      $(@el).html(@template())
      this

    positionHeroine: (everfree_scene) ->
      console.log("positioning heroine...")
      console.log(everfree_scene)
      $('#heroine img').css("left", everfree_scene.get('pony_position_left'))
      $('#heroine img').css("top", everfree_scene.get('pony_position_top'))
      $('#heroine img').css("width", everfree_scene.get('pony_width'))
      if everfree_scene.get('pony_reversed') and not $('#heroine img').hasClass('pony_reversed')
        $('#heroine img').addClass('flipped-image')
      if not everfree_scene.get('pony_reversed')
        $('#heroine img').removeClass('flipped-image')
      $('#outfit').css("left", everfree_scene.get('pony_position_left'))
      $('#outfit').css("top", everfree_scene.get('pony_position_top'))
      $('#outfit').css("width", everfree_scene.get('pony_width'))
      if everfree_scene.get('pony_reversed') and not $('#outfit').hasClass('pony_reversed')
        $('#outfit img').addClass('flipped-image')
      if not everfree_scene.get('pony_reversed')
        $('#outfit img').removeClass('flipped-image')

    positionCameo: (everfree_scene) ->
      console.log("positioning cameo...")
      $('#cameo').css("left", everfree_scene.get('cameo_position_left'))
      $('#cameo').css("top", everfree_scene.get('cameo_position_top'))
      $('#cameo').css("width", everfree_scene.get('cameo_width'))
      if everfree_scene.get('cameo_reversed') and not $('#cameo').hasClass('cameo_reversed')
        $('#cameo').addClass('flipped-image')
      if not everfree_scene.get('cameo_reversed')
        $('#cameo').removeClass('flipped-image')
